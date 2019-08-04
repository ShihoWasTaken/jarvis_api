<?php

namespace App\EventListener;

use App\Entity\User;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;
use Psr\Log\LoggerInterface;

class UserApiSubscriber implements EventSubscriber
{
    /**
     * @var LoggerInterface $logger
     */
    private $logger;

    /**
     * UserApiSubscriber constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    public function getSubscribedEvents(): array
    {
        return [
            Events::postPersist,
            Events::postUpdate,
            Events::postRemove
        ];
    }

    /**
     * Subscriber appelé uniquement lors de la création d'une entité
     *
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args): void
    {
        $this->logger->info("Création d'un User");
        $this->index($args);
    }

    /**
     * Subscriber appelé uniquement lors de la modification d'une entité
     *
     * @param LifecycleEventArgs $args
     */
    public function postUpdate(LifecycleEventArgs $args): void
    {
        $this->logger->info("Modification d'un User");
        $this->index($args);
    }

    /**
     * Subscriber appelé uniquement lors de la suppression d'une entité
     *
     * @param LifecycleEventArgs $args
     */
    public function postRemove(LifecycleEventArgs $args): void
    {
        $this->logger->info("Suppression d'un User");
        $this->index($args);
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function index(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof User) {
            $this->logger->info("Informations du User concerné: ", ['User' => $entity]);
        }
    }
}
