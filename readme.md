![logo](peter6prod.png)

# Un portfolio expérimental

L'objectif de ce projet est de tester le comportement de symfony sur Heroku avec une base de donnée postgres et des automatismes nodejs.

Pour le moment le résultat est concluant à l'exception du démarrage du dyno qui est un peu long.

Demo [ici](https://sipfolio.herokuapp.com) 

> il peut arriver que le dyno ai du mal et il faut recharger la page une fois pour que tout fonctionne s'il s'était endormie
 
![screen](sipfolio.png)

## Techniques testés
- Mise en page avec twig, webpack et surtout tailwindcss.
- extension twig permettant l'affichage de vignette et d'iframe à partir de l'url d'nu vidéo
- extension twig intégrant un headless chrome pour la génération de screenshot de sites à partir de l'url et activation d'une mise à jour à 2 jours d'intervalle.
...
  
## Roadmap

TODO:
- login admin
- intégration Alpine js?
- API avec api-platform
- application Electron (Angular) ou Flutter de gestion de contenus
