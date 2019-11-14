<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use App\Repository\UserRepository;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Tests\Encoder\BasePasswordEncoderTest;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $userRepository;
    private $router;

    public function __construct(UserRepository $userRepository, RouterInterface $router)
    {
        $this->userRepository = $userRepository;
        $this->router = $router;
    }

    public function supports(Request $request)
    {
        return $request->attributes->get('_route') === 'login'
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        return [
            'email' => $request->request->get('email'),
            'password' => $request->request->get('password'),
        ];
    }

    public function isPasswordValid(UserInterface $user, $post_password)
    {
        return $user->getPassword() == $post_password;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $this->userRepository->findOneBy(['email' => $credentials['email']]);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->isPasswordValid($user, $credentials['password']);
         //if using API this will only require return true
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        dd('Intruder!');
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
//        return new RedirectResponse($this->router->generate('admin'));
        return new RedirectResponse('admin');
        //return $this->redirect('admin');
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        // todo
    }

    public function supportsRememberMe()
    {
        // todo
    }

    protected function getLoginUrl()
    {

    }

/*    private function isPasswordValid(UserInterface $user, $password)
    {
    }*/
}
