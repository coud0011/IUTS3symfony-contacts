# Découverte de Symfony avec un site internet de contact
## Auteur
Axel COUDROT
## INSTALLATION / CONFIGURATION
### INSTALLATION
Pour installer le projet, vous allez devoir : 
- Avoir installé symfony et composer sur votre machine,
- Cloner le projet : 
```
git clone https://iut-info.univ-reims.fr/gitlab/coud0011/symfony-contacts.git
```
### CONFIGURATION
Une fois le projet installé, vous avez des scripts mis à votre disposition :
Pour lancer le projet :
```shell
composer start
```
Pour analyser l'ensemble des codes php et savoir s'il y a des problèmes qui ne respectent pas les normes de cs fixer
```shell
composer test:cs
```
Pour corriger les problèmes de code détectés par cs fixer
```shell
composer fix:cs
```
Pour lancer les tests fonctionnels de codeception
```shell
composer test:codeception
```
Pour lancer l'ensemble des tests
```shell
composer test
```