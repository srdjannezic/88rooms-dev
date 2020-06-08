<div class="well">
    <table class="table table-nobordered">
        <thead>
            <tr>
                <th><?php echo __('Korisnik'); ?></th>            
                <th><?php echo __('Datum postavljanja'); ?></th>                           
            </tr>
        </thead>
        <tbody>        
            <tr>
                <td><?php echo $data->contact->first_name . ' ' . $data->contact->last_name; ?></td>
                <td><?php echo $data->date_created; ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $data->message; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>