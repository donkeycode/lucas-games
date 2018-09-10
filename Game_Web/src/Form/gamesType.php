<?php
//src/App/Form/addType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class gamesType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('game', TextType::class)
        ->add('comment', TextareaType::class)
        ->add('date', DateTimeType::class)
        ->add('author', TextType::class)
        ->add('save', SubmitType::class);
  }

  public function configureOtpions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array('data_class' => games::class));
  }
}

?>
