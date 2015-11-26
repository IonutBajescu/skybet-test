<form method="post">

    <table>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Job Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($form as $k => $person): ?>
                <tr>
                    <td><input type="text" name="people[<?=e($k)?>][firstname]" value="<?=e(@$person['firstname'])?>" /></td>
                    <td><input type="text" name="people[<?=e($k)?>][surname]" value="<?=e(@$person['surname'])?>" /></td>
                    <td><input type="text" name="people[<?=e($k)?>][jobtitle]" value="<?=e(@$person['jobtitle'])?>" /></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <input type="submit" value="OK" />
</form>