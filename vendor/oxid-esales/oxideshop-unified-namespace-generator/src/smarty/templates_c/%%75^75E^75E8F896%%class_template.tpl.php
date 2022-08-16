<?php /* Smarty version 2.6.33, created on 2022-08-17 01:10:21
         compiled from class_template.tpl */ ?>
<?php if ($this->_tpl_vars['class']['isInterface']): ?>interface<?php elseif ($this->_tpl_vars['class']['isAbstract']): ?>abstract class<?php else: ?>class<?php endif; ?> <?php echo $this->_tpl_vars['class']['shortUnifiedClassName']; ?>
 extends \<?php echo $this->_tpl_vars['class']['editionClassName']; ?>

{

}

<?php if ($this->_tpl_vars['backwardsCompatibleClass']): ?>
/**
 * This class alias is created for backwards compatibility only.
 * The class <?php echo $this->_tpl_vars['backwardsCompatibleClass']; ?>
 is deprecated since OXID eShop v6.0.0 and should not be used any more as it
 * will be removed in the future.
 * Please use <?php echo $this->_tpl_vars['fullyQualifiedUnifiedClass']; ?>
 instead.
 */
class_alias(<?php echo $this->_tpl_vars['fullyQualifiedUnifiedClass']; ?>
::class, '<?php echo $this->_tpl_vars['backwardsCompatibleClass']; ?>
');
<?php endif; ?>