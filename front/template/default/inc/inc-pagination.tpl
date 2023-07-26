{* {if $pagination|default:null}
{$pageStartShow = $pagination.curent - 2}
{$pageEndShow = $pagination.curent + 2}

{if $pageStartShow < 1}
    {$pageStartShow = 1}
{/if}

{if $pageStartShow - 2 < 0}
    {$pageEndShow = $pageEndShow + {2 + {$pageStartShow - $pagination.curent}}}
{/if}

{if $pageEndShow >= $pagination.totalpage}
    {$pageEndShow = $pagination.totalpage}
{/if}

{if $pagination.total - $pagination.curent < 2}
    {$startAdd = 2 - {$pagination.totalpage - $pagination.curent}}
    {$pageStartShow = $pageStartShow - $startAdd}
{/if}

{if $pageStartShow < 1}
    {$pageStartShow = 1}
{/if}
<div class="pagination">
    <div class="row row-0">
        <div class="col">
            <div class="arrow">
                {if $pagination.curent-1 > 0}
                <a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}" class="link">
                    <span class="feather icon-chevron-left"></span>
                </a>
                {/if}
                {if $pagination.curent+1 <= $pagination.totalpage}
                <a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}" class="link">
                    <span class="feather icon-chevron-right"></span>
                </a>
                {/if}
            </div>
        </div>
        <div class="col-auto">
            <div class="page">
                <span>{$pagination.curent}</span>
                <span>{$pagination.totalpage}</span>
            </div>
        </div>
    </div>
</div>
{/if} *}