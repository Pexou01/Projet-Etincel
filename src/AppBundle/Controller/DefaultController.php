<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContextInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('Main/home.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
   /**
     * @Route("/Photos", name="galery")
     * @return type
     */
    public function galerieAction() {
        return $this->render('Main/galerie.html.twig');
        
    }
     /**
     * @Route("/Contact", name="contact")
     */
    public function contact1Action(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('Main/contact.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
     /**
     * @Route("/Contact-Mail", name="mail")
     * 
     */
    public function contactAction(Request $request) {
       //Instanciation de l'entity
         $contact = new Contact();
        //création du formulaire avec la class ContactType
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        //test si le formulaire est valide et s'il est submit
        if ($form->isSubmitted()and $form->isValid()) {
            //si oui alors enregistre les données du formulaire dans les variablse correspondante  
            $name = $form['name']->getData();
            $telephone = $form['telephone']->getData();
            $email = $form['email']->getData();
            $suject = $form['suject']->getData();
            $message = $form['message']->getData();
            //J'utilise la class mailer de symfony pour envoyer les données par mail 
            $message1 = \Swift_Message::newInstance()
                    ->setSubject($suject)
                    ->setFrom('frederidupont95@gmail.com')
                    ->setTo($email)
                    ->setBody($this->renderView('Main/sendmail.html.twig', array('name' => $name, 'telephone' => $telephone, 'email' => $email, 'suject' => $suject, 'message' => $message)), 'text/html');
            $this->get('mailer')->send($message1);
            // du coup j'enregistre les données sur ma bd alwaysdata
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            // Ajout d'un message flash
            $this->addFlash('info', 'Message Envoyer');
            //affichage du message de confirmation d'envoi de contacte
            return $this->render('Main/confirmation.html.twig', array('name' => $name, 'telephone' => $telephone, 'email' => $email, 'suject' => $suject, 'message' => $message));
        } else {
            //sinon affiche sa
            return $this->render('Main/mail.html.twig', array(
                        'form' => $form->createView()
            ));
        }
        //route du fichier contact.html.twig
        return $this->render('Main/mail.html.twig', array(
                    'form' => $form->createView()
        ));
    }
     /**
     * @Route("/Contact-téléphone", name="phone")
     */
    public function contactPhone1Action(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('Main/phone.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
