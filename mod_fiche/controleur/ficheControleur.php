<?php

class FicheControleur{

    private $parametre = array();
    private $oVue;
    private $oModele;
    private $pdf;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oModele = new FicheModele($parametre);

        $this->oVue = new FicheVue($parametre);

        $this->pdf = new tFPDF('P','mm','A4');
    }

    public function lister(){

        $valeurs = $this->oModele->getListeFiches();

        $this->oVue->genererAffichageListe($valeurs);
    }

    public function form_fiche_ajouter(){

        $newFiche = new FicheTable();

        $this->oVue->genererAffichageFiche($newFiche);
    }

    public function fiche_ajouter(){

        $controleFiche = new FicheTable($this->parametre);

        if ($controleFiche->getAutorisationBD() == false){
            $this->oVue->genererAffichageFiche($controleFiche);
        }else{
            $this->oModele->addFiche($controleFiche);
            header('location:index.php?gestion=action&action=form_ajouter');

        }
    }

    public function form_fiche_modifier(){

        $valeurs = $this->oModele->getUneFiche();

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function fiche_modifier(){

        $controleFiche = new FicheTable($this->parametre);

        if($controleFiche->getAutorisationBD() == false){
            $controleFiche::getMessageErreur();
            $this->oVue->genererAffichageFiche($controleFiche);
        }else{
            $this->oModele->editFiche($controleFiche);
            $controleFiche::getMessageErreur();
            header('location:index.php?gestion=action&action=form_modifier');
        }
    }

    public function supprimer(){
        $this->oModele->supprimer();
        echo 'es';
        $this->lister();
    }

    public function headerImpression(){
        // Logo
        $this->pdf->Image('public/images/logo.png',10,6,30);
        // Set la police
        $this->pdf->SetFont('Arial','B',20);
        $this->pdf->Cell(0,10,'FICHE SUIVEUSE',0,1,'C');

        $this->pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);

        $this->pdf->SetFont('DejaVu','',10);
        $this->pdf->Cell(0,10,'12ème BSMAT - NPX',0,0,'C');

        $this->pdf->Ln(15);
    }


    public function identification($identification, $numero, $date, $operateur){
        $this->pdf->SetFont('DejaVu','', 8);
        $this->pdf->SetFillColor(230,230,230);
        $this->pdf->SetX(27);
        $this->pdf->Cell(60,10,$identification,1,0,'C',1);
        $this->pdf->Cell(60,10,'Fiche n°' . $numero,1,0,'C',1);
        $this->pdf->Cell(60,10,'Date : '. $date,1,0,'C',1);
        $this->pdf->Cell(60,10,'Operateur : '. $operateur,1,1,'C',1);
        $this->pdf->Ln(5);
    }

    public function infoVehicule($vehicule, $type, $kilometrage, $immatriculation){
        $this->pdf->SetX(27);
        $this->pdf->Cell(60,10,'Véhicule : '. $vehicule,1,0,'C',1);
        $this->pdf->Cell(60,10,'Type : ' . $type,1,0,'C',1);
        $this->pdf->Cell(60,10,'Kilomètres : '. $kilometrage. ' km',1,0,'C',1);
        $this->pdf->Cell(60,10,'Immatriculation : '. $immatriculation,1,1,'C',1);
    }

    public function infoNumero($diag, $rep, $carrosserie, $grue){
        $this->pdf->SetX(27);
        $this->pdf->Cell(60,10,'N°IT Diag : '. $diag,1,0,'C',1);
        $this->pdf->Cell(60,10,'N°IT Rep : ' . $rep,1,0,'C',1);
        $this->pdf->Cell(60,10,'N°IT Carrosserie : '. $carrosserie,1,0,'C',1);
        $this->pdf->Cell(60,10,'N°IT Camion Grue : '. $grue,1,1,'C',1);
        $this->pdf->Ln(5);
    }

    public function enteteTab(){
        $this->pdf->Cell(20,10,'Type de rep :',1,0,'C',1);
        $this->pdf->Cell(110,10,'Opération à effectuer :',1,0,'C',1);
        $this->pdf->Cell(30,10,'Date :',1,0,'C',1);
        $this->pdf->Cell(20,10,'Trigramme :',1,0,'C',1);
        $this->pdf->Cell(95,10,'Observations :',1,1,'C',1);
    }

    public function corpsTab($actions = null){
        if ($actions == null){
            return;
        }
        else{
            foreach($actions as $action){
                $this->pdf->Cell(20,10,$action->getIdTypeRep()->getIntitule(),1,0,'C');
                $this->pdf->Cell(110,10,$action->getIntitule(),1,0,'C');
                $this->pdf->Cell(30,10,'',1,0,'C');
                $this->pdf->Cell(20,10,'',1,0,'C');
                $this->pdf->Cell(95,10,'',1,1,'C');
            }
        }
    }

    public function form_fiche_imprimer(){
        $uneFiche = $this->oModele->getUneFiche();

        $this->pdf->AddPage('L');

        // Partie informations générales de la fiche
        $identification = $uneFiche->getIdTypeFiche()->getIdIdentificationFiche()->getIntitule();
        $numero = $uneFiche->getIdFiche();
        $date = DateHeure::getDateFormat($uneFiche->getDateCreation());
        $operateur = $uneFiche->getIdEmploye()->getNom() . ' ' . $uneFiche->getIdEmploye()->getPrenom();
        $this->identification($identification, $numero, $date, $operateur);

        // Partie informations générales véhicule
        $vehicule = $uneFiche->getVehicule();
        $type = $uneFiche->getTypeVehicule();
        $kilometrage = $uneFiche->getKilometrage();
        $immatriculation = $uneFiche->getImmatriculation();
        $this->infoVehicule($vehicule, $type, $kilometrage, $immatriculation);

        // Partie différents numéros IT
        $diag = $uneFiche->getIdDiag();
        $rep = $uneFiche->getIdRep();
        $carrosserie = $uneFiche->getIdCarrosserie();
        $grue = $uneFiche->getIdCamGrue();
        $this->infoNumero($diag, $rep, $carrosserie, $grue);

        // Partie tableau
        $this->enteteTab();
        $actions = $this->oModele->getActions();
        $this->corpsTab($actions);

        $this->pdf->AliasNbPages();
        $this->pdf->Output('test.pdf','I');
    }

}