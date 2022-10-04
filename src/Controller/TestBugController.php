<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestBugController extends AbstractController
{

    public function __construct(
        private MailerInterface $mailer,){}

    #[Route('/test/bug', name: 'app_test_bug')]
    public function index(): Response
    {
            $mail = new TemplatedEmail();
            $mail
                ->from('info@mydomain.com')
                ->addTo('paul@mydomain.com')
                ->subject('test 👇')
                ->htmlTemplate('kanweg.html.twig');
            $this->mailer->send($mail);

            return new Response('ok');
    }
}
