{extends file="parent:frontend/listing/actions/action-filter-panel.tpl"}

{block name='frontend_listing_actions_filter_form'}
    <script>
        var filterPrefixList = {$filterPrefixList}
    </script>
    {$smarty.block.parent}
{/block}
