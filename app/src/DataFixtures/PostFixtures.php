<?php
/**
 * Post fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Monolog\DateTimeImmutable;

/**
 * Class PostFixtures.
 */
class PostFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     */
    public function loadData(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $post = new Post();
            $post->setTitle($this->faker->sentence);
            $post->setContent($this->faker->sentence);
            $post->setCreatedAt(
                DateTimeImmutable::createFromMutable($this->faker->dateTimeBetween('-100 days', '-1 days'))
            );
            $post->setUpdatedAt(
                DateTimeImmutable::createFromMutable($this->faker->dateTimeBetween('-100 days', '-1 days'))
            );
            $this->manager->persist($post);
        }

        $this->manager->flush();
    }
}
