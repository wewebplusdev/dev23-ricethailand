{if $pagination|default:null}
  <div class="pagination-block" data-aos="fade-up">
  {* จำนวน <span>{$pagination.total|number_format}</span> รายการ *}
    <div class="pagination-label">
        <div class="title">
            รายการทั้งหมด <strong>{$pagination.total|number_format}</strong>  รายการ
        </div>
    </div>
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
                  <ul class="item-list">
                    {if $pageStartShow > 1}
                        <li class="pagination-nav">
                            <a class="link" href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}1">
                                <span class="feather icon-chevrons-left"></span>
                            </a>
                        </li>
                    {/if}
                    {if $pagination.curent-1 > 0}
                      <li class="pagination-nav"><a class="link" href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}"><span class="feather icon-arrow-left"></span></a></li>
                    {/if}

                    {for $current=$pageStartShow to $pageEndShow}
                      <li class="num-page {if $current == $pagination.curent}active{/if}"><a class="link" href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" title="{$txtLang['tools:page']} {$current}">{$current}</a></li>
                    {/for}

                    {* <form method="GET"> *}
                      {* <li class="pagination-jumpPage">
                          <select name="page" class="select-control" onchange="window.location = $(this).val()">
                              <option value="javascript:void(0)" >ไปหน้า</option>
                              {for $current=1 to $pagination.totalpage}
                              <option value="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" >{$current}</option>
                              {/for}
                          </select>
                      </li> *}
                    {* </form> *}

                    {if $pagination.curent+1 < $pagination.totalpage}
                      <li class="pagination-nav"><a class="link" href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}"><span class="feather icon-arrow-right"></span></a></li>
                    {/if}
                    {if $pagination.curent+2 < $pagination.totalpage}
                        <li class="pagination-nav">
                            <a class="link" href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.totalpage}">
                                <span class="feather icon-chevrons-right"></span>
                            </a>
                        </li>
                    {/if}
                  </ul>
              </div>
  </div>


{/if}
