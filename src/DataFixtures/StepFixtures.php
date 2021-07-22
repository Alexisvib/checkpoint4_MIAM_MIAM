<?php

namespace App\DataFixtures;

use App\Entity\Step;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $step = new Step();
        $step->setNumber(1);
        $step->setDescription("Si vous utilisez des oignons, faites-les revenir (dans une sauteuse ou un wok) jusqu'à ce qu'ils soient fondants.");
        $manager->persist($step);
        $this->addReference('step_0', $step);

                $step = new Step();
        $step->setNumber(2);
        $step->setDescription("Coupez les tomates, ajoutez-les aux oignons, puis faites mijoter avec des herbes de Provence (n'hésitez pas !), sel et poivre.");
        $manager->persist($step);
        $this->addReference('step_1', $step);

                $step = new Step();
        $step->setNumber(3);
        $step->setDescription("Coupez les courgettes en rondelles puis incorporez-les au mélange..");
        $manager->persist($step);
        $this->addReference('step_2', $step);

                $step = new Step();
        $step->setNumber(4);
        $step->setDescription("Ajoutez de la sauce tomate (ou de la purée de tomate, à défaut), et 1 cuillère à café de sucre en poudre (plus en hiver, quand les tomates sont plus fades).");
        $manager->persist($step);
        $this->addReference('step_3', $step);

                $step = new Step();
        $step->setNumber(5);
        $step->setDescription("Laissez mijoter l'ensemble, 20 min environ, à feu moyen.");
        $manager->persist($step);
        $this->addReference('step_4', $step);

                $step = new Step();
        $step->setNumber(6);
        $step->setDescription("Une fois le mélange prêt, procédez à l'empilement dans un grand plat : 1 couche de lasagnes, 1 couche de préparation, 1 couche de béchamel, 1 couche de gruyère, et ainsi de suite (en rajoutant un peu de sel à chaque fois), en mettant beaucoup de gruyère sur la dernière couche.");
        $manager->persist($step);
        $this->addReference('step_5', $step);


        $step = new Step();
        $step->setNumber(1);
        $step->setDescription("Cuire 150 g de haricots à l'eau légèrement salée. Bien les égoutter.");
        $manager->persist($step);
        $this->addReference('step_6', $step);

        $step = new Step();
        $step->setNumber(2);
        $step->setDescription("Faire revenir 1 oignon émincé dans 1 cc d'huile. Ajouter les haricots et 1 poignée de tomates. Relever de sel et de poivre.");
        $manager->persist($step);
        $this->addReference('step_7', $step);

        //Mousse
        $step = new Step();
        $step->setNumber(1);
        $step->setDescription("Cassez le chocolat en morceaux dans une casserole et ajoutez six cuillères à soupe d’eau.");
        $manager->persist($step);
        $this->addReference('step_8', $step);

        $step = new Step();
        $step->setNumber(2);
        $step->setDescription("Faites fondre le chocolat sur feu doux en remuant jusqu’à obtenir une pâte lisse. Puis, Versez-la dans un saladier.");
        $manager->persist($step);
        $this->addReference('step_9', $step);

        $step = new Step();
        $step->setNumber(3);
        $step->setDescription("Séparez les blancs des jaunes d’œufs, incorporez les jaunes un par un dans le chocolat fondu et mélangez bien entre chaque œuf.");
        $manager->persist($step);
        $this->addReference('step_10', $step);

        $step = new Step();
        $step->setNumber(4);
        $step->setDescription("Montez les blancs en neige avec une pincée de sel. Quand ils sont bien fermes, mélangez très délicatement avec la préparation au chocolat en soulevant la masse pour ne pas casser les blancs.");
        $manager->persist($step);
        $this->addReference('step_11', $step);

        $step = new Step();
        $step->setNumber(5);
        $step->setDescription("Versez la mousse dans un saladier. Placez au réfrigérateur 3 heures minimum.");
        $manager->persist($step);
        $this->addReference('step_12', $step);


        // Poisson
        $step = new Step();
        $step->setNumber(1);
        $step->setDescription("Préchauffez le four à 180°C. Coupez les citrons et les tomates en rondelles fines et réservez. ");
        $manager->persist($step);
        $this->addReference('step_13', $step);

        $step = new Step();
        $step->setNumber(2);
        $step->setDescription("Disposez les filets de poisson au centre du papier sulfurisé, ajoutez les rondelles de tomates et de citron.");
        $manager->persist($step);
        $this->addReference('step_14', $step);

        $step = new Step();
        $step->setNumber(3);
        $step->setDescription("Ajoutez un peu d'huile d'olive, la crème fraîche, du sel et du poivre. Refermez les feuilles de papier sulfurisé puis placez les papillotes sur une plaque de four. Enfourner 20 minutes");
        $manager->persist($step);
        $this->addReference('step_15', $step);



        $manager->flush();
    }
}
