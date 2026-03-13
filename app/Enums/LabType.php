<?php

namespace App\Enums;

enum LabType: string
{
    case EngenhariaSocial = 'engenharia-social';
    case Phishing = 'phishing';
    case Malware = 'malware';
    case Ransomware = 'ransomware';

    // Helper opcional para pegar o nome bonito
    public function label(): string
    {
        return match($this) {
            self::EngenhariaSocial => 'Engenharia Social',
            self::Phishing => 'Simulação de Phishing',
            self::Malware => 'Análise de Malware',
            self::Ransomware => 'Defesa contra Ransomware',
        };
    }
}