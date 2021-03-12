<?php

namespace App\Utils;

class UFUtils {
    public static function getNomeUFPorCodigoIbge($codigo) {
        switch($codigo) {
            case 12: return "Acre";
            case 27: return "Alagoas";
            case 16: return "Amapá";
            case 13: return "Amazonas";
            case 29: return "Bahia";
            case 23: return "Ceará";
            case 53: return "Distrito Federal";
            case 32: return "Espírito Santo";
            case 52: return "Goiás";
            case 21: return "Maranhão";
            case 51: return "Mato Grosso";
            case 50: return "Mato Grosso do Sul";
            case 31: return "Minas Gerais";
            case 15: return "Pará";
            case 25: return "Paraíba";
            case 41: return "Paraná";
            case 26: return "Pernambuco";
            case 22: return "Piauí";
            case 33: return "Rio de Janeiro";
            case 24: return "Rio Grande do Norte";
            case 43: return "Rio Grande do Sul";
            case 11: return "Rondônia";
            case 14: return "Roraima";
            case 42: return "Santa Catarina";
            case 35: return "São Paulo";
            case 28: return "Sergipe";
            case 17: return "Tocantins";
            default: return "";
        }
    }

    public static function getCodigoUFPorCodigoIbge($codigo) {
        switch($codigo) {
            case 12: return "AC";
            case 27: return "AL";
            case 16: return "AP";
            case 13: return "AM";
            case 29: return "BA";
            case 23: return "CE";
            case 53: return "DF";
            case 32: return "ES";
            case 52: return "GO";
            case 21: return "MA";
            case 51: return "MT";
            case 50: return "MS";
            case 31: return "MG";
            case 15: return "PA";
            case 25: return "PB";
            case 41: return "PR";
            case 26: return "PE";
            case 22: return "PI";
            case 33: return "RJ";
            case 24: return "RN";
            case 43: return "RS";
            case 11: return "RO";
            case 14: return "RR";
            case 42: return "SS";
            case 35: return "SP";
            case 28: return "SE";
            case 17: return "TO";
            default: return "";
        }
    }
}