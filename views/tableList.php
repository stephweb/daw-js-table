<?php // Cette vue sera enregistr� dans une variable en PHP avec un buffer, et sera envoy� � la vue index.php en Ajax ?>
<table class="table-list">
    <thead>
        <tr>
            <th data-orderby="id">Id</th><?php // si on veut que Ajax ajoute un orderby et un order � la requete GET, mettre data-orderby dans th ?>
            <th data-orderby="name">Nom</th>
            <th data-orderby="description">Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($elements as $element) { ?>
        <tr>
            <td><?php echo $element->id; ?></td>
            <td><?php echo $element->name; ?></td>
            <td><?php echo $element->description; ?></td>
            <td>
                <a title="Modifier l'�l�ment" href="<?php echo route('edit', ['id' => $element->id]); ?>">
                    <img alt="Modifier" src="edit.png">
                </a>
                <a title="Supprimer l'�l�ment" href="<?php echo route('destroy', ['id' => $element->id]); ?>">
                    <img alt="Supprimer" src="destroy.png">
                </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>