<?php

namespace Controller;

class SecurityController extends \W\Controller\Controller
{
    /**
     * Inscription utilisateur
     */
    public function register()
    {
        $errors = [];
        $login = null;
        $email = null;
        $password = null;
        $cf_password = null;
        if (!empty($_POST)) { // Vérifie que le formulaire est posté
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cf_password = $_POST['cf-password'];
            $user_manager = new \Model\UserModel();

            if ($user_manager->usernameExists($login)) {
                $errors['login'] = 'Le login existe déjà.';
            }

            if ($user_manager->emailExists($email)) {
                $errors['email'] = 'L\'email existe déjà.';
            }

            if (strlen($login) < 4) {
                $errors['login'] = 'Le login est trop court.';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'L\'email n\'est pas valide';
            }

            if (strlen($password) < 4) {
                $errors['password'] = 'Le mot de passe est trop court.';
            }

            if ($password !== $cf_password) {
                $errors['password'] = 'Les mots de passe ne correspondent pas.';
            }

            if (empty($errors)) {
                // On instancie un objet AuthentificationModel qui va nous aider à faire l'authentification (hash du mot de passe, login, etc...)
                $auth_manager = new \W\Security\AuthentificationModel();
                // On inscrit l'utilisateur
                $user = $user_manager->insert([
                    'username' => $login,
                    'email' => $email,
                    'password' => $auth_manager->hashPassword($password),
                    'role' => 'user'
                ]);
                // Je connecte l'utilisateur
                $auth_manager->logUserIn($user);
                $this->redirectToRoute('default_home');
            }
        }

        $this->show('security/register', [
            'errors' => $errors,
            'login' => $login,
            'email' => $email
        ]);
    }

    /**
     * Déconnexion utilisateur
     */
    public function logout()
    {
        $auth_manager = new \W\Security\AuthentificationModel();
        // Deconnecte l'utilisateur
        $auth_manager->logUserOut();
        $this->redirectToRoute('default_home');
    }
}
