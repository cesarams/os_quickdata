{if !empty($message)}
    <div class="alert {if $errorData}alert-danger{else}alert-success{/if}" role="alert">
            {$message}
    </div>

{/if}
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            {l s='Borrar en masa las categorias'}
        </div>
        <form action="{$link->getAdminLink('AdminModules')}&configure=os_quickdata&deleteCategories=1" method="post">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">{l s='ID Categoria'}</th>
                <th scope="col">{l s='Nombre de Categoria'}</th>
                <th scope="col">{l s='Nivel'}</th>
                <th scope="col">{l s='Delete Category'}</th>
            </tr>
            </thead>
            <tbody>

            {foreach from=$categories item=category}
                <tr>
                    <th class='text-center'>{$category['id_category']}</th>
                    <td class='text-center'>{$category['name']}</td>
                    <td class='text-center' >{$category['level_depth']} </td>
                    <td class='text-center' > <input class="form-check-input" type="checkbox" name="{$category['name']}" value="{$category['id_category']}"> </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
            <div class="footer-container" style="margin-top: 3rem;">
                <div class="alert alert-warning" role="alert">
                    {l s='Se eliminaran las categorias seleccionadas, la cateogoria inicio no debe ser borrada'}
                </div>
                <button type="submit" class="btn btn-danger" type="button">{l s='Delete Categies'}</button>
            </div>
        </form>
    </div>
</div>