<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <form method="get">
        <div>
            Delimiter:
            <select name="delimiter">
                <option value=",">,</option>
                <option value="|">|</option>
                <option value="&">&</option>
            </select>
        </div>
        <div>
            Names:
            <input type="text" name="name"/>
        </div>
        <div>
            Ages:
            <input type="text" name="ages"/>
        </div>
        <div>
            <input type="submit" name="filter" value="Filter!"/>
        </div>
    </form>
    <?php if (isset($_GET['name']) && isset($_GET['ages'])): ?>
        <?php
        $names = explode($_GET['delimiter'], $_GET['name']);
        $ages = explode($_GET['delimiter'], $_GET['ages']);
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($names); $i++): ?>
                    <tr>
                        <td><?= $names[$i]; ?></td>
                        <td><?= $ages[$i]; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
