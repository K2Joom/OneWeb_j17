<?php
/**
 * @source		$Id: blog.php 20960 2011-03-12 14:14:00Z chdemko $
 * @package		Joomla.Site
 * @subpackage	Template.320j.
 * @author		Seth Warburton | @nternetinspired | http://internet-inspired.com
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params		= $this->item->params;
$canEdit	= $this->item->params->get('access-edit');
$user		= JFactory::getUser();
?>
<article class="item-page<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<hgroup>
    <header>
        <h1>
        <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    </header>
    <?php endif; ?>
    <?php if ($params->get('show_title')) : ?>
    <header>
        <h2>
        <?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
            <a href="<?php echo $this->item->readmore_link; ?>">
            <?php echo $this->escape($this->item->title); ?></a>
        <?php else : ?>
            <?php echo $this->escape($this->item->title); ?>
        <?php endif; ?>
        </h2>
    </header>
</hgroup>
<?php endif; ?>

<?php if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
	<section class="actions">
        <ul>
        <?php if (!$this->print) : ?>
            <?php if ($params->get('show_print_icon')) : ?>
                <li class="print-icon">
                <?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?>
                </li>
            <?php endif; ?>
    
            <?php if ($params->get('show_email_icon')) : ?>
                <li class="email-icon">
                <?php echo JHtml::_('icon.email',  $this->item, $params); ?>
                </li>
            <?php endif; ?>
    
            <?php if ($canEdit) : ?>
                <li class="edit-icon">
                <?php echo JHtml::_('icon.edit', $this->item, $params); ?>
                </li>
            <?php endif; ?>
    
        <?php else : ?>
            <li>
            <?php echo JHtml::_('icon.print_screen',  $this->item, $params); ?>
            </li>
        <?php endif; ?>
    
        </ul>
    </section>
<?php endif; ?>

<?php  if (!$params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<?php $useDefList = (($params->get('show_author')) OR ($params->get('show_category')) OR ($params->get('show_parent_category'))
	OR ($params->get('show_create_date')) OR ($params->get('show_modify_date')) OR ($params->get('show_publish_date'))
	OR ($params->get('show_hits'))); ?>

<?php if ($useDefList) : ?>
<aside class="articleMeta">
	<span class="metaIntro"><?php  echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></span>
<?php endif; ?>
<?php if ($params->get('show_parent_category') && $this->item->parent_slug != '1:root') : ?>
	<span class="parent-category-name">
	<?php	$title = $this->escape($this->item->parent_title);
	$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
	<?php if ($params->get('link_parent_category') AND $this->item->parent_slug) : ?>
		<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
	<?php else : ?>
		<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
	<?php endif; ?>
	</span>
<?php endif; ?>
<?php if ($params->get('show_category')) : ?>
	<span class="category">
	<?php 	$title = $this->escape($this->item->category_title);
	$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
	<?php if ($params->get('link_category') AND $this->item->catslug) : ?>
		<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
	<?php else : ?>
		<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
	<?php endif; ?>
	</span>
<?php endif; ?>
<?php if ($params->get('show_create_date')) : ?>
    <span class="createDate"><?php echo JText::_('COM_CONTENT_CREATED_DATE_ON') ;?>
        <span class="day"><?php echo JText::sprintf( JHTML::_('date',$this->item->created, JText::_('d'))); ?></span>
        <span class="month"><?php echo JText::sprintf( JHTML::_('date',$this->item->created, JText::_('F'))); ?></span>
        <span class="year"><?php echo JText::sprintf( JHTML::_('date',$this->item->created, JText::_('Y'))); ?></span>
    </span>
<?php endif; ?>
<?php if ($params->get('show_publish_date')) : ?>
    <span class="publishDate"><?php echo JText::_('COM_CONTENT_PUBLISHED_DATE') ;?>
        <span class="day"><?php echo JText::sprintf( JHTML::_('date',$this->item->publish_up, JText::_('d'))); ?></span>
        <span class="month"><?php echo JText::sprintf( JHTML::_('date',$this->item->publish_up, JText::_('F'))); ?></span>
        <span class="year"><?php echo JText::sprintf( JHTML::_('date',$this->item->publish_up, JText::_('Y'))); ?>.</span>
    </span>
<?php endif; ?>
<?php if ($params->get('show_modify_date')) : ?>
    <span class="modifiedDate"><?php echo JText::_('COM_CONTENT_LAST_UPDATED') ;?>
        <span class="day"><?php echo JText::sprintf( JHTML::_('date',$this->item->modified, JText::_('d'))); ?></span>
        <span class="month"><?php echo JText::sprintf( JHTML::_('date',$this->item->modified, JText::_('F'))); ?></span>
        <span class="year"><?php echo JText::sprintf( JHTML::_('date',$this->item->modified, JText::_('Y'))); ?>.</span>
    </span>
<?php endif; ?>
<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
	<span class="author">
		<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
        <?php if (!empty($this->item->contactid) && $params->get('link_author') == true): ?>
        <?php
            $needle = 'index.php?option=com_contact&view=contact&id=' . $this->item->contactid;
            $item = JSite::getMenu()->getItems('link', $needle, true);
            $cntlink = !empty($item) ? $needle . '&Itemid=' . $item->id : $needle;
        ?>
            <?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_($cntlink), $author)); ?>
        <?php else: ?>
            <?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
        <?php endif; ?>
	</span>
<?php endif; ?>
<?php if ($params->get('show_hits')) : ?>
	<span class="hits">
	<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
	</span>
<?php endif; ?>
<?php if ($useDefList) : ?>
</aside>    
<?php endif; ?>

<?php if (isset ($this->item->toc)) : ?>
	<?php echo $this->item->toc; ?>
<?php endif; ?>

<section class="article-body">
<?php if ($params->get('access-view')):?>
	<?php echo $this->item->text; ?>

	<?php //optional teaser intro text for guests ?>
<?php elseif ($params->get('show_noauth') == true AND  $user->get('guest') ) : ?>
	<?php echo $this->item->introtext; ?> 
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JURI($link1);?>        
		<p class="readmore">
		<a href="<?php echo $link; ?>">
		<?php $attribs = json_decode($this->item->attribs);  ?>
		<?php
		if ($attribs->alternative_readmore == null) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
			    echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?></a>
		</p>       
	<?php endif; ?>
<?php endif; ?>
</section>
<?php echo $this->item->event->afterDisplayContent; ?>
</article>