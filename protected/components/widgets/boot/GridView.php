<?php

/**
 * Description of GridView
 *
 * @author daniel.stojilovic
 */
Yii::import('bootstrap.widgets.BootGridView');

class GridView extends BootGridView {    

    public function renderSummary() {
        $summaryText = Yii::t('zii', 'Displaying {start}-{end} of {count} result(s).');
        if (($count = $this->dataProvider->getItemCount()) <= 0 && $this->summaryText != null) {
            $this->summaryText = preg_replace("/Displaying(.*)\./", "", $this->summaryText);
        }

        echo '<div class="' . $this->summaryCssClass . '">';
        if ($this->enablePagination) {
            if (($summaryText = $this->summaryText) === null)
                $summaryText = Yii::t('zii', 'Displaying {start}-{end} of {count} result(s).');
            $pagination = $this->dataProvider->getPagination();
            $total = $this->dataProvider->getTotalItemCount();
            $start = $pagination->currentPage * $pagination->pageSize + 1;
            $end = $start + $count - 1;
            if ($end > $total) {
                $end = $total;
                $start = $end - $count + 1;
            }
            echo strtr($summaryText, array(
                '{start}' => $start,
                '{end}' => $end,
                '{count}' => $total,
                '{page}' => $pagination->currentPage + 1,
                '{pages}' => $pagination->pageCount,
            ));
        } else {
            if (($summaryText = $this->summaryText) === null)
                $summaryText = Yii::t('zii', 'Total {count} result(s).');
            echo strtr($summaryText, array(
                '{count}' => $count,
                '{start}' => 1,
                '{end}' => $count,
                '{page}' => 1,
                '{pages}' => 1,
            ));
        }
        echo '</div>';
    }

}
