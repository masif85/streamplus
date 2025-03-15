<?php

namespace App\Controller;

use App\Form\UserInformationType;
use App\Form\AddressInformationType;
use App\Form\PaymentInformationType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RegistrationController extends AbstractController
{
    private $entityManager;
    private $userRepository;

    public function __construct(EntityManagerInterface $entityManager, UserRepository $userRepository)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request): Response
    {
        // Step 1: User Information
        $formUser = $this->createForm(UserInformationType::class);
        $formUser->handleRequest($request);

        if ($formUser->isSubmitted() && $formUser->isValid()) {
            $data = $formUser->getData();
            $user = new User();
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setSubscriptionType($data['subscription_type']);

            $request->getSession()->set('user_data', $data);
            return $this->redirectToRoute('app_address_info');
        }

        return $this->render('registration/user_information.html.twig', [
            'form' => $formUser->createView(),
        ]);
    }

    #[Route('/address', name: 'app_address_info')]
    public function address(Request $request): Response
    {
        $sessionData = $request->getSession()->get('user_data');
        $formAddress = $this->createForm(AddressInformationType::class);
        $formAddress->handleRequest($request);

        if ($formAddress->isSubmitted() && $formAddress->isValid()) {
            $data = $formAddress->getData();
            // Save address info in session
            $request->getSession()->set('address_data', $data);
            return $this->redirectToRoute('app_payment_info');
        }

        return $this->render('registration/address_information.html.twig', [
            'form' => $formAddress->createView(),
        ]);
    }

    #[Route('/payment', name: 'app_payment_info')]
    public function payment(Request $request): Response
    {
        if ($request->getSession()->get('user_data')['subscription_type'] === 'Free') {
            return $this->redirectToRoute('app_confirmation');
        }

        $formPayment = $this->createForm(PaymentInformationType::class);
        $formPayment->handleRequest($request);

        if ($formPayment->isSubmitted() && $formPayment->isValid()) {
            $data = $formPayment->getData();
            // Save payment info and confirm user registration
            // ...

            return $this->redirectToRoute('app_confirmation');
        }

        return $this->render('registration/payment_information.html.twig', [
            'form' => $formPayment->createView(),
        ]);
    }

    #[Route('/confirmation', name: 'app_confirmation')]
    public function confirmation(Request $request): Response
    {
        // Handle confirmation view
        return $this->render('registration/confirmation.html.twig');
    }
}
