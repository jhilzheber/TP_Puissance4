<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Puissance4</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" integrity="sha256-SmSEXNAArTgQ8SR6kKpyP/N+jA8f8q8KpG0qQldSKos=" crossorigin="anonymous" />
</head>
<body>
<div class="container">
    <h1>Ring</h1>
    <h2>Hello <?= $pseudo ?></h2>
    <?php if (count($players) > 0): ?>
        <table class="table">
            <thead>
            <tr>
                <th>Identifier</th>
                <th>Pseudo</th>
                <th>Statute</th>
                <th>Team</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($players as $player): ?>
                <tr>
                    <td><?= $player->identifier() ?></td>
                    <td><?= $player->pseudo() ?></td>
                    <td><?= $player->team() ?></td>
                    <td>
                        <statut>
                            <?= nl2br($player->statute()) ?>
                        </statut>
                    </td>
                </tr>
            <?php endforeach ?>

            </tbody>
            <tfoot>
            <tr>
                <th>Identifier</th>
                <th>Pseudo</th>
                <th>Statute</th>
                <th>Team</th>
            </tr>
            </tfoot>
        </table>
    <?php else: ?>
        <p>Nothing to display, we've got no record yet.</p>
    <?php endif ?>
</div>
</body>
</html>