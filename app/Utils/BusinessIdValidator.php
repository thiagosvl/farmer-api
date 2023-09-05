<?php

namespace App\Utils;

class BusinessIdValidator
{
    /**
     * Validates a CPF number.
     *
     * @param string $cpf
     * @return bool
     */
    public static function validateCPF(string $cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    /**
     * Validates a CNPJ number.
     *
     * @param string $cnpj
     * @return bool
     */
    public static function validateCNPJ(string $cnpj): bool
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        if (strlen($cnpj) != 14) {
            return false;
        }

        $valida = array(6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2);
        $digitoA = 0;
        $digitoB = 0;

        for ($i = 0; $i < 12; $i++) {
            $digitoA += $cnpj[$i] * $valida[$i + 1];
        }
        $somaA = ($digitoA % 11);
        $digitoA = $somaA < 2 ? 0 : 11 - $somaA;

        for ($i = 0; $i < 13; $i++) {
            $digitoB += $cnpj[$i] * $valida[$i];
        }
        $somaB = ($digitoB % 11);
        $digitoB = $somaB < 2 ? 0 : 11 - $somaB;

        return (($cnpj[12] == $digitoA) && ($cnpj[13] == $digitoB));
    }
}
