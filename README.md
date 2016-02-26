[![GitHub release](https://img.shields.io/github/release/aussitot/eedomus_livebox_infos.svg?style=flat-square)](https://github.com/aussitot/eedomus_livebox_infos/releases)
![GitHub license](https://img.shields.io/github/license/aussitot/eedomus_livebox_infos.svg?style=flat-square)
![Status](https://img.shields.io/badge/Status-beta-red.svg?style=flat-square)
[![Twitter](https://img.shields.io/badge/twitter-@havok-blue.svg?style=flat-square)](http://twitter.com/havok)
# eedomus_livebox_infos
Script php pour récupérer sur eedomus les informations techniques de sa livebox
script créé par twitter:@Havok et modifié par @nono1024 pour la eedomus

NB : Script à installer sur l'eedomus elle-même

## Configuration
Dans le fichier **livebox.php**, modifiez les lignes :
```php
// paramètres
$myhost = "192.168.1.1"; //adresse IP de votre livebox sur le réseau local
$myusername = "admin"; //login pour accéder à la console d'administration de la livebox
$mypassword = "mdpadefinir"; //password pour accéder à la console d'administration de la livebox.
```
## Installation
Vous devez d'abord être connecté sous votre compte sur http://secure.eedomus.com.
Rendez vous ensuite sur :

    http://ip_de_votre_box/script/

Envoyez le fichier **livebox.php**

## Paramètres
Les options possibles :

    http://localhost/script/?exec=livebox.php&action=wifistate
Donne l'état du wifi.
- Xpath : //root/result/status/Enable
- Résultat : 1 pour activé, et 0 pour désactivé


    http://localhost/script/?exec=livebox.php&action=lanstate
Donne l'état du LanJe vous laisse regarder pour le Xpath, plein de résultat dispo (@MAC, status des 4 interfaces....)

    http://localhost/script/?exec=livebox.php&action=dslstate
Donne l'état des compteurs du lien DSL (erreurs....). Pareil je vous laisse regarder pas mal de choix en retour

    http://localhost/script/?exec=livebox.php&action=users
Affiche les différents users configuré. Pareil je vous laisse regarder pas mal de choix en retour

    http://localhost/script/?exec=livebox.php&action=iplan
- Affiche l'@IP lan de la box
- xpath : //root/result/status
- Résultat : l'@IP lan


    http://localhost/script/?exec=livebox.php&action=ipwan
- Affiche l'@IP wan de la box
- Xpath : //root/result/status
- Résultat : l'@IP wan


    http://localhost/script/?exec=livebox.php&action=wanstate
- Affiche l'état du lien WAN de la box
- Xpath : //root/result/status
- Résultat : 1 pour activé, 0 pour non actif


- Xpath :  //root/result/data/LinkType
- Résultat : vdsl pour moi mais adsl je suppose comme autre choix


- Xpath :  //root/result/data/LinkState
- Résultat : up pour connecté et down (je suppose) pour non connecté

D'autre infos dispo mais je les détaillerai pas  :D

    http://localhost/script/?exec=livebox.php&action=phonestate
Affiche l'état de la TOIP
- Xpath : //root/result/status/status/enable
- Résultat : enable ou disabled


- Xpath : //root/result/status/status/trunk_lines/status/status
- Résultat : up ou down

Etc.....

    http://localhost/script/?exec=livebox.php&action=tvstate
Affiche l'état de la TV. Pas activé chez moi.....

    http://localhost/script/?exec=livebox.php&action=hosts
Affiche les hôtes connectés. Je vous laisse regarder pas mal de choix en retour.

    http://localhost/script/?exec=livebox.php&action=reboot
Ben ça reboot la livebox. Pas testé hein :)

    http://localhost/script/?exec=livebox.php&action=wifion
Active le wifi

    http://localhost/script/?exec=livebox.php&action=wifioff
Désactive le Wifi

    http://localhost/script/?exec=livebox.php&action=mibs
Le premier choix codé pas Havok, beaucoup de choses dedans....

    http://localhost/script/?exec=livebox.php&action=macon
Active le filtrage par @MAC du Wifi de la livebox

    http://localhost/script/?exec=livebox.php&action=macoff
Désactive le filtrage par @MAC du Wifi de la livebox

    http://localhost/script/?exec=livebox.php&action=dslinfo
- Xpath : //root/result/status/dsl/dsl0/DownstreamCurrRate

Retourne le débit descendant
