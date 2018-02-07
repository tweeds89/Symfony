<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Todo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TodoController extends Controller{
    /**
     * @Route("/", name="todo_list")
     */
    public function listAction(){
        $todos = $this->getDoctrine()->getRepository('AppBundle:Todo')
            ->findAll();

        return $this->render('todo/index.html.twig', 
                             array('todos' => $todos));          
    }
    
    /**
     * @Route("/todos/create", name="todo_create")
     */
    public function createAction(Request $request){
        $todo = new Todo;
        $form = $this->createFormBuilder($todo)
            ->add('nazwa', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('kategoria', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('opis', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('priorytet', ChoiceType::class, array('choices' =>array('Niski'=>'Niski', 'Normalny'=>'Normalny', 'Wysoki'=>'Wysoki'), 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('termin', DateTimeType::class, array('attr' => array('class' => 'formcontrol', 'style' => 'margin-bottom:15px')))
            ->add('zapisz', SubmitType::class, array('label' =>'Nowe zadanie', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
            ->getForm();
        
        $form->handleRequest($request);
        
        if($form -> isSubmitted() && $form->isValid()){
            $nazwa = $form['nazwa']->getData();
            $kategoria = $form['kategoria']->getData();
            $opis = $form['opis']->getData();
            $priorytet = $form['priorytet']->getData();
            $termin = $form['termin']->getData();
            
            $now = new\DateTime('now');
            
            $todo->setNazwa($nazwa);
            $todo->setKategoria($kategoria);
            $todo->setOpis($opis);
            $todo->setPriorytet($priorytet);
            $todo->setTermin($termin);
            $todo->setDataUtworzenia($now);
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($todo);
            $em->flush();
            
            $this->addFlash(
                'notice',
                'Todo Added'
            );
            
            return $this->redirectToRoute('todo_list');
            
        }
            
            
        return $this->render('todo/create.html.twig', array(
            'form' => $form->createView()));          
    }
    
    /**
     * @Route("/todos/edit/{id}", name="todo_edit")
     */
    public function editAction($id, Request $request){

        return $this->render('todo/edit.html.twig');          
    }
    
    /**
     * @Route("/todos/details/{id}", name="todo_details")
     */
    public function detailsAction($id){

        return $this->render('todo/details.html.twig');          
    }    
}