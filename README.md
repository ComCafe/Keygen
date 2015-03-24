# Keygen

Keygen est une petite class pour la génération de mot de passe.

Elle est assez simple a utiliser

Quelques exemples d'utilisations :

**Pour générer un mot de passe de 10 caractères**

Fct : Keygen::factory(10)->random();

Résultat : 0qS6ZsJVwG

**Pour générer un Serial**

Fct : Keygen::factory()->serial(4,4,"-");

Résultat : Je59-Jpet-eZtI-1iED

**Pour générer un Serial Customisé**

Fct : Keygen::factory()->customSerial("ITEM-####-####-##BE", "#");

Résultat : ITEM-SWcp-96Np-GYBE

**Pour générer un mot de passe plus compliqué**

Fct : Keygen::factory(10)->hard()->random();

Résultat : vB!Ls{dLEt

**Pour générer un mot de passe en minuscule**

Fct : Keygen::factory(10)->lower()->random();

Résultat : umiisrv8id

**Pour générer un mot de passe en majuscule**

Fct : Keygen::factory()->upper()->random();

Résultat : ZWRDEJMSTR


Les fonctions sont chainable pour pouvoir générer des mots de passes et/ou serial plus compliqué en majuscule.
