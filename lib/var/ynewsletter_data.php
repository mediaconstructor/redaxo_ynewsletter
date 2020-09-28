<?php

/**
 * REX_YNEWSLETTER_DATA[1].
 */
class rex_var_ynewsletter_data extends rex_var
{
    protected function getOutput()
    {
        $field = $this->getArg('field', 0, true);
        if (!in_array($this->getContext(), ['ynewsletter_template'])) { // || !is_numeric($id) || $id < 1 || $id > 20
            return false;
        }

        $value = $this->getContextData();
        $value = $value[$field] ?? '';

        if ($this->hasArg('isset') && $this->getArg('isset')) {
            return $value ? 'true' : 'false';
        }

        $output = $this->getArg('output');
        if ('html' == $output) {
            $value = str_replace(['<?', '?>'], ['&lt;?', '?&gt;'], $value);
        } elseif ('html' == $output) {
            $value = htmlspecialchars($value);
            $value = nl2br($value);
        }
        return self::quote($value);
    }
}
