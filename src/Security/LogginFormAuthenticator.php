<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class LogginFormAuthenticator extends AbstractGuardAuthenticator
{
    public function supports(Request $request)
    {
        return $request->attributes->get('_route') === 'security_login'
            // Je n’interviens que si la request possède dans ces attributs 
            // quelques chose qui s’appelle “_route “ et qui doit être égal a “security_login”. 
            && $request->isMethod('POST');
        // et uniquement si la requeste est en methode POST
    }

    public function getCredentials(Request $request)
    {
        // But : ressort les informations de connexion à partir de la request. Montrer moi vos papiers !
        // On affiche les infos d'identification
        // Affichage du tableau ('login')
        return $request->request->get('login');
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // le but du getUser est de cherhcer dans la base de données si l'utilisateur y est bien et si ses papiers 
        //sont en régles

    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // todo
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        // todo
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // todo
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        // todo
    }

    public function supportsRememberMe()
    {
        // todo
    }
}
