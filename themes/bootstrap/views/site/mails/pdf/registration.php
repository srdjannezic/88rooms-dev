<div class="page-header" style="position: relative;min-height: 100px;">
    <table class="table-nobordered">
        <tr>
            <td class="center">
                <span class="head1span center small" ><?php echo __("Ugovor o saradnji"); ?></span><br/><br>                
            </td>            
        </tr>
    </table>
</div>
<br/>
<table class="table-nobordered">
    <tr>
        <td><?php echo __('Zaključen između:'); ?><br/><br>  </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="span2"><span class="head6spansmall span1"/><?php echo __('Firme:'); ?></span></td>
        <td><span class="head6span"/>Kamionče d.o.o. Beograd</span></td>
    </tr>
    <tr>
        <td class="span2"><span class="head6spansmall span1"/><?php echo __('Adresa:'); ?></span></td>
        <td><span class="head6span"/>Adresa</span></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="span2"><span class="head6spansmall span1"/><?php echo __('Ime i prezime'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->first_name) . " " . CHtml::encode($model->last_name); ?></span></td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Adresa'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->address) . ", " . CHtml::encode($model->zip_code) . " " . CHtml::encode($model->city->name) ?></span></td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Kontakt telefon'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->contact_phone) ?></span></td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('PIB'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->company_pib) ?></span></td>
    </tr> 
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Email'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->email) ?></span></td>
    </tr>   
</table>