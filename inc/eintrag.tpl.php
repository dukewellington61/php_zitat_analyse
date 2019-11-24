<table>
    <tr>
        <th style="border-style:solid; border-width:2px;" >Inhalt</th>
        <th style="border-style:solid; border-width:2px;" >Autor</th>
        <th style="border-style:solid; border-width:2px;" >erstellt am</th>
    </tr>
    <tr>
        <td style="border-style:solid; border-width:2px;"><?= nl2br(makeSave($zitat['inhalt'])) ?></td>
        <td style="border-style:solid; border-width:2px;"><?=makeSave($zitat['autor']) ?></td>
        <td style="border-style:solid; border-width:2px;"> <?= $zitat['erstellt_am'] ?></td>
    </tr>  
</table>