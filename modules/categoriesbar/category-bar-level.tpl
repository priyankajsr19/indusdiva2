<li class="{if $last == 'true'}last{/if}">
	<a href="{$node.link|escape:htmlall:'UTF-8'}" class="menu_head {if $node.id == $currentCategoryId}selected{/if}"  rel="dropmenu{$node.id}">{$node.name|upper|escape:htmlall:'UTF-8'}</a>
    <div id="dropmenu{$node.id}" class="dropmenudiv">
    {if $node.children|@count > 0}
    <ul> 
		{foreach from=$node.children item=child name=categoriesLevel}
			{if $smarty.foreach.categoriesLevel.last}
            {include file="$tpl_dir./category-tree-branch.tpl" node=$child last='true'}
			{else}
			{include file="$tpl_dir./category-tree-branch.tpl" node=$child last='false'}
			{/if}
		{/foreach}       
    </ul>
	{/if}
    </div>
</li>


