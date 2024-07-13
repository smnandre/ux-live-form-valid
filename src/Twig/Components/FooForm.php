<?php

namespace App\Twig\Components;

use App\Form\FooType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class FooForm extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveProp(writable: true)]
    public array $initialFormData = [
        'name' => '',
        'email' => '',
        'zip_code' => '',
        'city' => '',
    ];

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(FooType::class, $this->initialFormData);
    }

    // public function __invoke()
    // {
    //     $this->submitForm(true);
    // }
}
