<?php
require_once 'vendor/phpoffice/phpword/bootstrap.php';
require_once "vendor/autoload.php";

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\IOFactory;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-type: text/plain; charset=utf-8');

$phpWord = new PhpWord();
$section = $phpWord->addSection([
    'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11),
    'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5)
]);

$fontStyle_Title_1 = 'Font_Style_Title_1';
$phpWord->addFontStyle(
    $fontStyle_Title_1,
    array('name' => 'Times New Roman', 'size' => 14, 'color' => '0070C0', 'bold' => true, 'underline' => 'single')
);
$fontStyle_Title_2 = 'Font_Style_Title_2';
$phpWord->addFontStyle(
    $fontStyle_Title_2,
    array('name' => 'Times New Roman', 'size' => 14, 'color' => '000000', 'bold' => true)
);
$fontStyle_Overview_main = 'Font_Style_Overview_main';
$phpWord->addFontStyle(
    $fontStyle_Overview_main,
    array('name' => 'Times New Roman', 'size' => 10, 'color' => '000000')
);
$fontStyle_Overview_main_bold = 'Font_Style_Overview_main_bold';
$phpWord->addFontStyle(
    $fontStyle_Overview_main_bold,
    array('name' => 'Times New Roman', 'size' => 10, 'color' => '000000', 'bold' => true)
);

$fontStyle_Paragraph_main = 'FontStyle_Paragraph_main';
$phpWord->addFontStyle(
    $fontStyle_Paragraph_main,
    array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000')
);
$fontStyle_Paragraph_main_bold = 'FontStyle_Paragraph_main_bold';
$phpWord->addFontStyle(
    $fontStyle_Paragraph_main_bold,
    array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true)
);
$fontStyle_Paragraph_main_bold_underline = 'FontStyle_Paragraph_main_bold_underline';
$phpWord->addFontStyle(
    $fontStyle_Paragraph_main_bold_underline,
    array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true, 'underline' => 'single')
);


$phpWord->addParagraphStyle('style_align_center', array('align' => 'center'));

$identify_info = "UnKnown User";
if(isset($_POST['identify_info'])){
    $identify_info = $_POST['identify_info'];
}
$section->addText( 'Report from '.$identify_info,  
    $fontStyle_Overview_main_bold,
    'style_align_left'
);

$section->addText( 'OVERVIEW',  
    $fontStyle_Title_1,
    'style_align_center'
);


$textrun = $section->createTextRun();

$textrun->addText('The ', $fontStyle_Overview_main);
$textrun->addText('MARI ', $fontStyle_Overview_main_bold);
$textrun->addText('(Mandala Assessment Research Instrument) is a comprehensive system that assesses an individual’s hand drawn Mandalas and their selection of symbols and colors in order to reveal the inner truth and reality of the subject as it is –not what the ego filters of consciousness would want it to be, but what it really is to the individual (often from deep within). ', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('MARI has nothing to do with fortune telling or getting answers from the universe or akashic records (as with some other card systems).  The MARI accesses your own conscious and subconscious mind for information about what is true for you in that moment (your Mari is likely to change every time you take it.) The value of the MARI test is that not only does it show what you probably know is going on, but it is also reveals things that you might not be consciously aware of.   If you take the MARI multiple times (especially at different stages of a transition or therapeutic process) you can see the changes that occur.', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Carl Jung recognized the mandala as “the center of personality, a kind of central point within the psyche, to which everything is related, by which everything is arranged and which is, itself, a source of energy. This center,” said Jung, “is not felt or thought of as ego but, if one may so express it, as the self.”  Jung’s description of the mandala is also an excellent description of the MARI.', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();

$textrun->addText('1. SYMBOL/MANDALA', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('Symbols predate culture, language and even time. They are so much a part of human beings that we make mental connections with them that are not often conscious. An upward pointing triangle, for example, is typically chosen by people who are beginning something new –literally or symbolically. The individual is directed to select symbols that are attractive or repellent.', $fontStyle_Overview_main);
$textrun->addTextBreak();

$textrun->addText('2. COLOR', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('The individual is then directed to choose, from a pool of 45 color cards, the color that they feel “goes with” each of their chosen symbols. Art therapists have long recognized the connections between color and the psychological associations that are typically made on an ‘other than conscious’ level. These colors add dimensions that may be emotional, physical, cognitive or spiritual to the chosen symbols.', $fontStyle_Overview_main);
$textrun->addTextBreak();

$textrun->addText('3. STAGES', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('The sets of symbol and color cards are then placed on a ‘field’ that is comprised of thirteen developmental (or current process) stages (in 4 quadrants and a center) that are arranged sequentially. There are three symbol cards for each stage reflecting differing aspects of that stage.', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('The following diagram illustrates these stages in the metaphor of a tree that starts as potential (in life force) and moves from seed, to sprouting, to growth and ultimately to death and transformation to new seeds. These stages can be illustrated in human development from pre-birth, through the womb, infancy, toddlerhood, adolescence, adulthood, middle age, old age, and ultimately death and transformation. It can also be illustrated through any process of transformation of as what Joseph Campbell calls “the Hero’s Journey”.', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('What shows up in your Mandala card spread can be a mixture of things that happened in your actual development and things that are going on right now.', $fontStyle_Overview_main);
$textrun->addTextBreak();

// $textrun->addImage('assets/image/overview_1.png', array('width' => 220, 'height' => 220, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT));
// $textrun->addTextBreak();
// $textrun->addTextBreak();
$textrun->addText('Here is an overview of all 13 Stages.', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage Zero (Clear Light) is the “Core” of All-ness and Nothing-ness – the Life Force', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	A Transpersonal, transcendent place', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Deep spiritual and mystical states', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Original, organizing life force', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Unity of all dualities Felt and sensed rather than articulated', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Wholeness / True “Home”', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();

$textrun->addText('Quadrant One is Called “Forming” ', $fontStyle_Title_2);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 1 (ENTRY) is about the descent into form or matter', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Aspects of physical embodiment and gravity', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Close to earth and the deep unconscious', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Might feel like you don’t fit into the world', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Might be loneliness', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 2 (Bliss) is about forming without knowing (pre-conscious creativity)', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	No boundaries', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	“Information” comes in-through dreams, intuition, sensing, or “sleeping on it”', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Growth in multiple forms- physically, spiritually or sensory', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Receptivity / Regeneration / Recovery', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Possibly bombarded by information to the point that we must sensor it – so what do we let in or pay', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('         	attention to?', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 3 (Labyrinth) is about the movement of energy or finding one’s path', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Neurological connections between mind and body', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Feelings and images predominate', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Energy / A beginning trust in the process', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Consciousness is activated', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();

$textrun->addText('Quadrant Two is Called “Becoming”', $fontStyle_Title_2);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 4 (Beginnings) is about the readiness to start', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Concern with basic needs and support', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	New Beginnings', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Mother / Child Relationships', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Passivity and dependency', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 5 (The Target) is about focus and determining and defending boundaries', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Learning HOW: patterns, rules and rhythms', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Laying down rings of protection; Protects self and builds boundaries', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Learning to focus and discriminate to sacred from the profane', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	The first assertion of the self as ego; concern with self preservation and defense', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 6 (Struggle) is about the “dragon fight”', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Breaking free of parental or authoritarian dictates and beginning a quest to find one’s true self', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Establishment and expression of ego boundaries', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	‘Dragon Fight” and “slaying of the parents” – surpassing of the mother (holds child fast) and father (values', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('         	and tradition)', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();

$textrun->addText('Quadrant  Three is Called “Manifesting”', $fontStyle_Title_2);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 7 (Squaring the Circle) is about coming into full consciousness', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Self (Ego) is fully evident and expressed / Balance', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Assumption of autonomy and responsibility', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Linearity and form enter the realm of wholeness', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	The expectations of the world are of primary importance to the sense of self-enough money, degrees, etc. /', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('         	Getting established in the world', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 8 (Functioning Ego) is about becoming a “Specialist” at who you are or what you do', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Full autonomy and will', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Individuality and full identity', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Mature / can be alone but not lonely', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Career Issues', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	I met the expectations of the world – now I am doing it my way', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText(htmlspecialchars('Stage 9 (Self & Others) is about Manifesting and Crystallization'), $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Self and others / group identification / professional peer respect', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Socialization of self with others as a larger organism', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Wants to bring things to completion, leave a mark or legacy; interest in mentorship', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Mastery or rejecting political correctness', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	The sense of what one has and hasn’t accomplished', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();

$textrun->addText('Quadrant Four is Called “Dissolving”', $fontStyle_Title_2);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 10 (Endings) is about shifts and changes', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Mid-life and a time to reassess goals; a time to sort through and jettison the non-essential', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Any shift, change or ending', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Crossroads or major transitional change', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	A gate- some see it as a burden, others welcome it', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Feeling separated and a sense of loss, an encounter with death', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 11 (Fragmentation) is about disintegration of a “dark night of the soul”', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	The dark night of the soul', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	A time of creative chaos; crisis and opportunity', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	A stage of unanswerable questions – feeling victimized by “fate”', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	A time of fear, confusion and loss of meaning', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Transpersonal purging / purification', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	PSTD', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Pain Body', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Loss of Control', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Can’t make an omelet if you don’t break some eggs', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Stage 12 (Transcendent Ecstasy) is about integration', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	Rebirth', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Order out of chaos', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Realignment with self/new potentials', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Self-actualization / self and Self align', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	A sense of culmination and closure', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Left Brain / Right Brain Synergy', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addTextBreak();

$textrun->addText('After a Hero’s Journey through the stages, you can arrive back at Stage 1 – as a Re-Entry', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();
$textrun->addText('        ●	The heaviness of physical embodiment in a different way; burden of “mission” and/or message', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Beginning again in a whole new way', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Again, may feel like you don’t fit into the world, or that the world may not understand your work', $fontStyle_Overview_main);
$textrun->addTextBreak();
$textrun->addText('        ●	Conscious of the interconnectedness and complexity of life; assent to process', $fontStyle_Overview_main);
$textrun->addTextBreak();

$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addText('Here is the "spread" from the choices you made:', $fontStyle_Overview_main_bold);
$textrun->addTextBreak();

// print_r($_POST);
// print_r($_FILES);

if (isset($_POST['screenshot_image'])) {
    $base64_code = $_POST['screenshot_image'];
    date_default_timezone_set("America/Los_Angeles");
    $cur_date_time = date("Y-m-d H_i_s");
    file_put_contents('./assets/report_image/'.$cur_date_time.'.png', base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64_code)));
    Crop_Image($cur_date_time);
    $textrun->addImage('./assets/report_image/crop_'.$cur_date_time.'.png', array('width' => 400, 'height' => 300, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT)); 
    $textrun->addTextBreak();
    $textrun->addTextBreak();    
}

$textrun->addText("Attracted:", $fontStyle_Paragraph_main);
$textrun->addTextBreak();
if(isset($_POST['attract_card_id'])){
    for($i = 0 ; $i < 6; $i ++){
        $textrun->addText(strtoupper(str_replace("svg_","",$_POST['attract_card_id'][$i])),$fontStyle_Paragraph_main);
        $temp_index = $_POST['attract_card_id'][$i];
        $color_name = str_replace("_", " ", $_POST['attract_color_id'][$temp_index]);
        $textrun->addText("   ".$color_name,$fontStyle_Paragraph_main);
        $textrun->addTextBreak();    
    }
    $textrun->addTextBreak();    
    $textrun->addTextBreak();    
}

$textrun->addText("Rejected:", $fontStyle_Paragraph_main);
$textrun->addTextBreak();
if(isset($_POST['reject_card_id'])){
    for($i = 0 ; $i < 2; $i ++){
        $textrun->addText(strtoupper(str_replace("svg_","",$_POST['reject_card_id'][$i])),$fontStyle_Paragraph_main);
        $temp_index = $_POST['reject_card_id'][$i];
        $color_name = str_replace("_", " ", $_POST['reject_color_id'][$temp_index]);
        $textrun->addText("   ".$color_name,$fontStyle_Paragraph_main);     
        $temp_index = $_POST['reject_card_id'][$i];
        $color_name = str_replace("_", " ", $_POST['remedy_color_id'][$temp_index]);
        $textrun->addText(" - changed to ".$color_name,$fontStyle_Paragraph_main);
        $textrun->addTextBreak();    
    }
    $textrun->addTextBreak();    
    $textrun->addTextBreak();    
}

$textrun->addText("Guidance:", $fontStyle_Paragraph_main);
$textrun->addTextBreak();
if(isset($_POST['guidance_card_id'])){
    for($i = 0 ; $i < 2; $i ++){
        $textrun->addText(strtoupper(str_replace("svg_","",$_POST['guidance_card_id'][$i])),$fontStyle_Paragraph_main);
        $temp_index = $_POST['guidance_card_id'][$i];
        $color_name = str_replace("_", " ", $_POST['guidance_color_id'][$temp_index]);
        $textrun->addText("   ".$color_name,$fontStyle_Paragraph_main);     
        $textrun->addTextBreak();    
    }
    $textrun->addTextBreak();    
    $textrun->addTextBreak();    
}

$textrun->addTextBreak();
$textrun->addTextBreak();
$textrun->addImage('./assets/image/overview_2.png', array('width' => 400, 'height' => 300, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT)); 
$textrun->addTextBreak();
$textrun->addTextBreak();

$textrun->addText("Here are the descriptions for the cards you chose:",$fontStyle_Paragraph_main);     
$textrun->addTextBreak();    
$textrun->addTextBreak();    

$textrun->addText("ATTRACTED CARDS",$fontStyle_Paragraph_main);     
$textrun->addTextBreak();    
$textrun->addTextBreak();    

if(isset($_POST['attract_card_id'])){
    for($i = 0 ; $i < 6; $i ++){
        //////////// Paragraph 1 ////////////
        $stage_name = Get_Stage_from_Card(str_replace("svg_","",$_POST['attract_card_id'][$i]));
        $stage_data = Get_Stage($stage_name);
        //print_r($stage_name);

        $textrun->addText(strtoupper(str_replace("svg_","",$_POST['attract_card_id'][$i])),$fontStyle_Paragraph_main_bold_underline);
        $temp_index = $_POST['attract_card_id'][$i];
        $color_name = str_replace("_", " ", $_POST['attract_color_id'][$temp_index]);
        $textrun->addText("   ".$color_name,$fontStyle_Paragraph_main_bold_underline);
        $textrun->addTextBreak();    
        $textrun->addTextBreak();    

        //print_r($stage_data);
        $textrun->addText($stage_data[1]['stage_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $detail = $stage_data[1]['stage_detail'];
        if (strpos($detail, '#BoldStart') !== false) {
            $temp = substr($detail, 0, strpos($detail,'#BoldStart'));
            $textrun->addText($temp, $fontStyle_Paragraph_main);

            $temp = substr($detail, strpos($detail,'#BoldStart') + 10 + 1, strpos($detail,'#BoldEnd') - strpos($detail,'#BoldStart') - 10 - 1);
            $textrun->addText($temp, $fontStyle_Paragraph_main_bold);

            $temp = substr($detail, strpos($detail,'#BoldEnd') + 8 + 1, strlen($detail) - strpos($detail,'#BoldEnd') - 8);
            $textrun->addText($temp, $fontStyle_Paragraph_main);
            $textrun->addTextBreak();
            $textrun->addTextBreak();    
        }
        else{
            $textrun->addText($stage_data[1]['stage_detail'], $fontStyle_Paragraph_main);
            $textrun->addTextBreak();
            $textrun->addTextBreak();    
        }
        // print_r($stage_data);

        //////////// Paragraph 2 ////////////

        $card_name = str_replace("svg_","",$_POST['attract_card_id'][$i]);
        $card_data = Get_Card($card_name);

        $textrun->addText($card_data[1]['card_title'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();

        $textrun->addText($card_data[1]['card_detail'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        //////////// Paragraph 3 ////////////

        $temp_index = $_POST['attract_card_id'][$i];
        $color_name = $_POST['attract_color_id'][$temp_index];
        $color_data = Get_Color($color_name);

        // print_r("Paragraph3 -> color_data: x");
        // print_r($color_data);
        // print_r("x");

        $textrun->addText($color_data[1]['color_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_bold'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_detail'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        //////////// Paragraph 4 ////////////

        $stage_name = Get_Stage_from_Card(str_replace("svg_","",$_POST['attract_card_id'][$i]));
        $stage_data = Get_Stage($stage_name);

        $temp_index = $_POST['attract_card_id'][$i];
        $color_name = $_POST['attract_color_id'][$temp_index];


        $temp_arr = explode('_', $color_name);
        $temp_arr[0] = $temp_arr[0].":";
        $color_name = strtoupper(implode(" ",$temp_arr));
        $color_data = Get_Color_From_Stage($stage_name, $color_name);

        // print_r("Paragraph44444 -> color_data: x");
        // print_r($color_data);
        // print_r("x");
        $textrun->addText($color_data[1]['color_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_detail'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  
    }
}
$textrun->addText("---------------------------------------------",$fontStyle_Paragraph_main);     
$textrun->addTextBreak();    
$textrun->addTextBreak();    


$textrun->addText("REJECTED CARDS",$fontStyle_Paragraph_main);     
$textrun->addTextBreak();    
$textrun->addTextBreak();    

if(isset($_POST['reject_card_id'])){
    for($i = 0 ; $i < 2; $i ++){
        //////////// Paragraph 1 ////////////
        $stage_name = Get_Stage_from_Card(str_replace("svg_","",$_POST['reject_card_id'][$i]));
        $stage_data = Get_Stage($stage_name);

        $textrun->addText(strtoupper(str_replace("svg_","",$_POST['reject_card_id'][$i])),$fontStyle_Paragraph_main_bold_underline);
        $temp_index = $_POST['reject_card_id'][$i];
        $color_name = str_replace("_", " ", $_POST['reject_color_id'][$temp_index]);
        $textrun->addText("   ".$color_name,$fontStyle_Paragraph_main_bold_underline);
        $textrun->addTextBreak();    
        $textrun->addTextBreak();    

        $textrun->addText($stage_data[1]['stage_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $detail = $stage_data[1]['stage_detail'];
        if (strpos($detail, '#BoldStart') !== false) {
            $temp = substr($detail, 0, strpos($detail,'#BoldStart'));
            $textrun->addText($temp, $fontStyle_Paragraph_main);

            $temp = substr($detail, strpos($detail,'#BoldStart') + 10 + 1, strpos($detail,'#BoldEnd') - strpos($detail,'#BoldStart') - 10 - 1);
            $textrun->addText($temp, $fontStyle_Paragraph_main_bold);

            $temp = substr($detail, strpos($detail,'#BoldEnd') + 8 + 1, strlen($detail) - strpos($detail,'#BoldEnd') - 8);
            $textrun->addText($temp, $fontStyle_Paragraph_main);
            $textrun->addTextBreak();
            $textrun->addTextBreak();    
        }
        else{
            $textrun->addText($stage_data[1]['stage_detail'], $fontStyle_Paragraph_main);
            $textrun->addTextBreak();
            $textrun->addTextBreak();    
        }
        // print_r($stage_data);

        //////////// Paragraph 2 ////////////

        $card_name = str_replace("svg_","",$_POST['reject_card_id'][$i]);
        $card_data = Get_Card($card_name);

        $textrun->addText($card_data[1]['card_title'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();

        $textrun->addText($card_data[1]['card_detail'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        //////////// Paragraph 3 ////////////

        $temp_index = $_POST['reject_card_id'][$i];

        $color_name = $_POST['reject_color_id'][$temp_index];
        $color_data = Get_Color($color_name);

        $textrun->addText($color_data[1]['color_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_bold'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_detail'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        $textrun->addText("Changed to", array('name' => 'Times New Roman', 'size' => 12, 'color' => '0000FF'));
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        $color_name = $_POST['remedy_color_id'][$temp_index];
        $color_data = Get_Color($color_name);

        $textrun->addText($color_data[1]['color_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_bold'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_detail'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        //////////// Paragraph 4 ////////////

        $stage_name = Get_Stage_from_Card(str_replace("svg_","",$_POST['reject_card_id'][$i]));
        $stage_data = Get_Stage($stage_name);

        $temp_index = $_POST['reject_card_id'][$i];

        $color_name = $_POST['reject_color_id'][$temp_index];

        $temp_arr = explode('_', $color_name);
        $temp_arr[0] = $temp_arr[0].":";
        $color_name = strtoupper(implode(" ",$temp_arr));
        $color_data = Get_Color_From_Stage($stage_name, $color_name);

        $textrun->addText($color_data[1]['color_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_detail'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        $textrun->addText("Changed to", array('name' => 'Times New Roman', 'size' => 12, 'color' => '0000FF'));
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        $color_name = $_POST['remedy_color_id'][$temp_index];

        $temp_arr = explode('_', $color_name);
        $temp_arr[0] = $temp_arr[0].":";
        $color_name = strtoupper(implode(" ",$temp_arr));
        $color_data = Get_Color_From_Stage($stage_name, $color_name);

        $textrun->addText($color_data[1]['color_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_detail'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  
    }
}
$textrun->addText("---------------------------------------------",$fontStyle_Paragraph_main);     
$textrun->addTextBreak();    
$textrun->addTextBreak();    


$textrun->addText("GUIDANCE CARDS",$fontStyle_Paragraph_main);     
$textrun->addTextBreak();    
$textrun->addTextBreak();    

if(isset($_POST['guidance_card_id'])){
    for($i = 0 ; $i < 2; $i ++){
        //////////// Paragraph 1 ////////////
        $stage_name = Get_Stage_from_Card(str_replace("svg_","",$_POST['guidance_card_id'][$i]));
        $stage_data = Get_Stage($stage_name);

        $textrun->addText(strtoupper(str_replace("svg_","",$_POST['guidance_card_id'][$i])),$fontStyle_Paragraph_main_bold_underline);
        $temp_index = $_POST['guidance_card_id'][$i];
        $color_name = str_replace("_", " ", $_POST['guidance_color_id'][$temp_index]);
        $textrun->addText("   ".$color_name,$fontStyle_Paragraph_main_bold_underline);
        $textrun->addTextBreak();    
        $textrun->addTextBreak();    

        $textrun->addText($stage_data[1]['stage_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $detail = $stage_data[1]['stage_detail'];
        if (strpos($detail, '#BoldStart') !== false) {
            $temp = substr($detail, 0, strpos($detail,'#BoldStart'));
            $textrun->addText($temp, $fontStyle_Paragraph_main);

            $temp = substr($detail, strpos($detail,'#BoldStart') + 10 + 1, strpos($detail,'#BoldEnd') - strpos($detail,'#BoldStart') - 10 - 1);
            $textrun->addText($temp, $fontStyle_Paragraph_main_bold);

            $temp = substr($detail, strpos($detail,'#BoldEnd') + 8 + 1, strlen($detail) - strpos($detail,'#BoldEnd') - 8);
            $textrun->addText($temp, $fontStyle_Paragraph_main);
            $textrun->addTextBreak();
            $textrun->addTextBreak();    
        }
        else{
            $textrun->addText($stage_data[1]['stage_detail'], $fontStyle_Paragraph_main);
            $textrun->addTextBreak();
            $textrun->addTextBreak();    
        }
        // print_r($stage_data);

        //////////// Paragraph 2 ////////////

        $card_name = str_replace("svg_","",$_POST['guidance_card_id'][$i]);
        $card_data = Get_Card($card_name);

        $textrun->addText($card_data[1]['card_title'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();

        $textrun->addText($card_data[1]['card_detail'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        //////////// Paragraph 3 ////////////

        $temp_index = $_POST['guidance_card_id'][$i];
        $color_name = $_POST['guidance_color_id'][$temp_index];
        $color_data = Get_Color($color_name);

        $textrun->addText($color_data[1]['color_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_bold'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_detail'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  

        //////////// Paragraph 4 ////////////

        $stage_name = Get_Stage_from_Card(str_replace("svg_","",$_POST['guidance_card_id'][$i]));
        $stage_data = Get_Stage($stage_name);

        $temp_index = $_POST['guidance_card_id'][$i];
        $color_name = $_POST['guidance_color_id'][$temp_index];


        $temp_arr = explode('_', $color_name);
        $temp_arr[0] = $temp_arr[0].":";
        $color_name = strtoupper(implode(" ",$temp_arr));
        $color_data = Get_Color_From_Stage($stage_name, $color_name);

        $textrun->addText($color_data[1]['color_title'], $fontStyle_Paragraph_main_bold);
        $textrun->addTextBreak();

        $textrun->addText($color_data[1]['color_detail'], $fontStyle_Paragraph_main);
        $textrun->addTextBreak();
        $textrun->addTextBreak();  
    }
}
$textrun->addText("---------------------------------------------",$fontStyle_Paragraph_main);     
$textrun->addTextBreak();    
$textrun->addTextBreak();    


//$textrun->addImage('assets/image/SVG/i.svg', array('width' => 144, 'height' => 103, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT));
// $textrun->addImage('assets/image/PNG/j.png', array('width' => 144, 'height' => 103, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
// $textrun->addImage('assets/image/PNG/ij.png', array('width' => 144, 'height' => 103, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT));
//$section->addImage('assets/image/test_gold.png');

// Saving the document as OOXML file...
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('report.docx');

Send_Mail();


if (file_exists('./assets/report_image/'.$cur_date_time.'.png'))
    unlink('./assets/report_image/'.$cur_date_time.'.png');
if (file_exists('./assets/report_image/crop_'.$cur_date_time.'.png'))
    unlink('./assets/report_image/crop_'.$cur_date_time.'.png');



function Get_Stage_from_Card($card_name){
    if($card_name == "a" || $card_name == "ab" || $card_name == "b")
        return "STAGE 0";
    if($card_name == "c" || $card_name == "cd" || $card_name == "d")
        return "STAGE 1";
    if($card_name == "e" || $card_name == "ef" || $card_name == "f")
        return "STAGE 2";
    if($card_name == "g" || $card_name == "gh" || $card_name == "h")
        return "STAGE 3";
    if($card_name == "i" || $card_name == "ij" || $card_name == "j")
        return "STAGE 4";
    if($card_name == "k" || $card_name == "kl" || $card_name == "l")
        return "STAGE 5";
    if($card_name == "m" || $card_name == "mn" || $card_name == "n")
        return "STAGE 6";
    if($card_name == "o" || $card_name == "op" || $card_name == "p")
        return "STAGE 7";
    if($card_name == "q" || $card_name == "qr" || $card_name == "r")
        return "STAGE 8";
    if($card_name == "s" || $card_name == "st" || $card_name == "t")
        return "STAGE 9";
    if($card_name == "u" || $card_name == "uv" || $card_name == "v")
        return "STAGE 10";
    if($card_name == "w" || $card_name == "wx" || $card_name == "x")
        return "STAGE 11";
    if($card_name == "yz" || $card_name == "y" || $card_name == "z")
        return "STAGE 12";

    return "STAGE 0";
}

function Crop_Image($cur_date_time){

    list($width, $height, $type, $attr) = getimagesize('./assets/report_image/'.$cur_date_time.'.png');

    $dst_x = 0;   // X-coordinate of destination point
    $dst_y = 0;   // Y-coordinate of destination point
    $src_x = $width*0.25; // Crop Start X position in original image
    $src_y = $height*0.03; // Crop Srart Y position in original image
    $dst_w = $width*0.5; // Thumb width
    $dst_h = $height*0.9; // Thumb height
    $src_w = $width*0.5; // Crop end X position in original image
    $src_h = $height*0.82; // Crop end Y position in original image
    
    if(isset($_POST['flag_duplicated'])){
        if($_POST['flag_duplicated'] == "not_duplicated"){
            $src_h = $height*0.73; // Crop end Y position in original image
        }
    }

    // Creating an image with true colors having thumb dimensions (to merge with the original image)
    $dst_image = imagecreatetruecolor($dst_w, $dst_h);
    // Get original image
    $src_image = imagecreatefrompng('./assets/report_image/'.$cur_date_time.'.png');
    // Cropping
    imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
    // Saving
    imagepng($dst_image, './assets/report_image/crop_'.$cur_date_time.'.png');
}

function Get_Stage($stage_name){
    include('db/connect.php');

    $sql="SELECT * FROM t_paragraph_1 WHERE stage_name='".$stage_name."'";
    
    $result = mysqli_query($conn, $sql);
    $rtn_array = array();
    array_push($rtn_array, array('status' => 'load data fail'));

    if(!$result)
        return $rtn_array;
    $rtn_array[0]['status'] = 'success';

    //print_r($rtn_array);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          array_push($rtn_array, array('stage_title'=>$row['stage_title'], 'stage_detail'=>$row['stage_detail']));
      }
    } else {
        $rtn_array[0]['status'] = 'no data';
    }
    return $rtn_array;
}

function Get_Card($card_name){
    include('db/connect.php');

    $sql="SELECT * FROM t_paragraph_2 WHERE card_name='".$card_name."'";
    $result = mysqli_query($conn, $sql);
    $rtn_array = array();
    array_push($rtn_array, array('status' => 'load data fail'));

    if(!$result)
        return $rtn_array;
    $rtn_array[0]['status'] = 'success';

    //print_r($rtn_array);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          array_push($rtn_array, array('card_title'=>$row['card_title'], 'card_detail'=>$row['card_detail']));
      }
    } else {
        $rtn_array[0]['status'] = 'no data';
    }
    return $rtn_array;
}

function Get_Color($color_name){
    include('db/connect.php');

    $sql="SELECT * FROM t_paragraph_3 WHERE color_name='".$color_name."'";
    $result = mysqli_query($conn, $sql);
    $rtn_array = array();
    array_push($rtn_array, array('status' => 'load data fail'));

    if(!$result)
        return $rtn_array;
    $rtn_array[0]['status'] = 'success';

    //print_r($rtn_array);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        //   print_r("Get_Color(): x");
        //   print_r($row);
        //   print_r("x ");
          array_push($rtn_array, array('color_title'=>$row['color_title'], 'color_bold'=>$row['color_bold'], 'color_detail'=>$row['color_detail']));
      }
    } else {
        $rtn_array[0]['status'] = 'no data';
    }
    return $rtn_array;
}

function Get_Color_From_Stage($stage_name, $color_name){
    include('db/connect.php');

    // print_r("Get_Color_From_Stage:    ");
    // print_r("color_name: x".$color_name."x   ");
    $sql="SELECT * FROM t_paragraph_4 WHERE stage_name='".$stage_name."'AND color_name='".$color_name."'";
    $result = mysqli_query($conn, $sql);
    $rtn_array = array();
    array_push($rtn_array, array('status' => 'load data fail'));

    if(!$result)
        return $rtn_array;
    $rtn_array[0]['status'] = 'success';

    //print_r($rtn_array);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        // print_r("Get_Color_From_Stage(): x");
        // print_r($row);
        // print_r("x ");
        array_push($rtn_array, array('color_title'=>$color_name." at ".$stage_name, 'color_detail'=>$row['color_detail']));
      }
    } else {
        $rtn_array[0]['status'] = 'no data';
    }
    return $rtn_array;
}

function Send_Mail(){
    $identify_info = "No identify information";
    if(isset($_POST['identify_info'])){
        $identify_info = $_POST['identify_info'];
    }

    $email = new PHPMailer(true);
    $email->SetFrom('from@colorsandsymbols.com', $identify_info); //Name is optional
    $email->Subject   = 'Color Cards';
    $email->Body      = "Report for Color Cards Test";
    $email->AddAddress( 'nisha@frogmail.net' ,'Stef Davis');

    $file_to_attach = 'report.docx';

    $email->AddAttachment( $file_to_attach , 'report.docx' );

    try {
        $email->send();
        echo "Mail has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $email->ErrorInfo;
    }
    
    $email2 = new PHPMailer(true);
    $email2->SetFrom('from@colorsandsymbols.com', $identify_info); //Name is optional
    $email2->Subject   = 'Color Cards';
    $email2->Body      = "Report for Color Cards Test";
    $email2->AddAddress( 'bracamon74@gmail.com' ,'Stef Davis');

    $file_to_attach = 'report.docx';

    $email2->AddAttachment( $file_to_attach , 'report.docx' );

    $email2->send();

}

?>

