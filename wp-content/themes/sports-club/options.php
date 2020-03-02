<?php       
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier chaAre you ready to tak
 nges, it'll appear as if the options have been reset.
 */ 

function optionsframework_option_name() {
	// Change this to use your theme slug
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'sports-club'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
*/

function optionsframework_options() {
	//array of all custom font types.
	$font_types = array( '' => '',
    'ABeeZee' => 'ABeeZee',
    'Abel' => 'Abel',
    'Abril Fatface' => 'Abril Fatface',
    'Aclonica' => 'Aclonica',
    'Acme' => 'Acme',
    'Actor' => 'Actor',
    'Adamina' => 'Adamina',
    'Advent Pro' => 'Advent Pro',
    'Aguafina Script' => 'Aguafina Script',
    'Akronim' => 'Akronim',
    'Aladin' => 'Aladin',
    'Aldrich' => 'Aldrich',
    'Alegreya' => 'Alegreya',
    'Alegreya Sans SC' => 'Alegreya Sans SC',
    'Alegreya SC' => 'Alegreya SC',
    'Alex Brush' => 'Alex Brush',
    'Alef' => 'Alef',
    'Alfa Slab One' => 'Alfa Slab One',
    'Alice' => 'Alice',
    'Alike' => 'Alike',
    'Alike Angular' => 'Alike Angular',
    'Allan' => 'Allan',
    'Allerta' => 'Allerta',
    'Allerta Stencil' => 'Allerta Stencil',
    'Allura' => 'Allura',
    'Almendra' => 'Almendra',
    'Almendra Display' => 'Almendra Display',
    'Almendra SC' => 'Almendra SC',
    'Amiri' => 'Amiri',
    'Amarante' => 'Amarante',
    'Amaranth' => 'Amaranth',
    'Amatic SC' => 'Amatic SC',
    'Amethysta' => 'Amethysta',
    'Amita' => 'Amita',
    'Anaheim' => 'Anaheim',
    'Andada' => 'Andada',
    'Andika' => 'Andika',
    'Annie Use Your Telescope' => 'Annie Use Your Telescope',
    'Anonymous Pro' => 'Anonymous Pro',
    'Antic' => 'Antic',
    'Antic Didone' => 'Antic Didone',
    'Antic Slab' => 'Antic Slab',
    'Anton' => 'Anton',
    'Angkor' => 'Angkor',
    'Arapey' => 'Arapey',
    'Arbutus' => 'Arbutus',
    'Arbutus Slab' => 'Arbutus Slab',
    'Architects Daughter' => 'Architects Daughter',
    'Archivo White' => 'Archivo White',
    'Archivo Narrow' => 'Archivo Narrow',
    'Arial' => 'Arial',
    'Arimo' => 'Arimo',
    'Arya' => 'Arya',
    'Arizonia' => 'Arizonia',
    'Armata' => 'Armata',
    'Artifika' => 'Artifika',
    'Arvo' => 'Arvo',
    'Asar' => 'Asar',
    'Asap' => 'Asap',
    'Asset' => 'Asset',
	'Assistant' => 'Assistant',
    'Astloch' => 'Astloch',
    'Asul' => 'Asul',
    'Atomic Age' => 'Atomic Age',
    'Aubrey' => 'Aubrey',
    'Audiowide' => 'Audiowide',
    'Autour One' => 'Autour One',
    'Average' => 'Average',
    'Average Sans' => 'Average Sans',
    'Averia Gruesa Libre' => 'Averia Gruesa Libre',
    'Averia Libre' => 'Averia Libre',
    'Averia Sans Libre' => 'Averia Sans Libre',
    'Averia Serif Libre' => 'Averia Serif Libre',
    'Battambang' => 'Battambang',
    'Bad Script' => 'Bad Script',
    'Bayon' => 'Bayon',
    'Balthazar' => 'Balthazar',
    'Bangers' => 'Bangers',
    'Basic' => 'Basic',
    'Baumans' => 'Baumans',
    'Belgrano' => 'Belgrano',
    'Belleza' => 'Belleza',
    'BenchNine' => 'BenchNine',
    'Bentham' => 'Bentham',
    'Berkshire Swash' => 'Berkshire Swash',
    'Bevan' => 'Bevan',
    'Bigelow Rules' => 'Bigelow Rules',
    'Bigshot One' => 'Bigshot One',
    'Bilbo' => 'Bilbo',
    'Bilbo Swash Caps' => 'Bilbo Swash Caps',
    'Biryani' => 'Biryani',
    'Bitter' => 'Bitter',
    'White Ops One' => 'White Ops One',
    'Bokor' => 'Bokor',
    'Bonbon' => 'Bonbon',
    'Boogaloo' => 'Boogaloo',
    'Bowlby One' => 'Bowlby One',
    'Bowlby One SC' => 'Bowlby One SC',
    'Brawler' => 'Brawler',
    'Bree Serif' => 'Bree Serif',
    'Bubblegum Sans' => 'Bubblegum Sans',
    'Bubbler One' => 'Bubbler One',
    'Buda' => 'Buda',
    'Buenard' => 'Buenard',
    'Butcherman' => 'Butcherman',
    'Butcherman Caps' => 'Butcherman Caps',
    'Butterfly Kids' => 'Butterfly Kids',
    'Cabin' => 'Cabin',
    'Cabin Condensed' => 'Cabin Condensed',
    'Cabin Sketch' => 'Cabin Sketch',
    'Cabin' => 'Cabin',
    'Caesar Dressing' => 'Caesar Dressing',
    'Cagliostro' => 'Cagliostro',
    'Calligraffitti' => 'Calligraffitti',
    'Cambay' => 'Cambay',
    'Cambo' => 'Cambo',
    'Candal' => 'Candal',
    'Cantarell' => 'Cantarell',
    'Cantata One' => 'Cantata One',
    'Cantora One' => 'Cantora One',
    'Capriola' => 'Capriola',
    'Cardo' => 'Cardo',
    'Carme' => 'Carme',
    'Carrois Gothic' => 'Carrois Gothic',
    'Carrois Gothic SC' => 'Carrois Gothic SC',
    'Carter One' => 'Carter One',
    'Caveat' => 'Caveat',
    'Caveat Brush' => 'Caveat Brush',
    'Catamaran' => 'Catamaran',
    'Caudex' => 'Caudex',
    'Cedarville Cursive' => 'Cedarville Cursive',
    'Ceviche One' => 'Ceviche One',
    'Changa One' => 'Changa One',
    'Chango' => 'Chango',
    'Chau Philomene One' => 'Chau Philomene One',
    'Chenla' => 'Chenla',
    'Chela One' => 'Chela One',
    'Chelsea Market' => 'Chelsea Market',
    'Cherry Cream Soda' => 'Cherry Cream Soda',
    'Cherry Swash' => 'Cherry Swash',
    'Chewy' => 'Chewy',
    'Chicle' => 'Chicle',
    'Chivo' => 'Chivo',
    'Chonburi' => 'Chonburi',
    'Cinzel' => 'Cinzel',
    'Cinzel Decorative' => 'Cinzel Decorative',
    'Clicker Script' => 'Clicker Script',
    'Coda' => 'Coda',
    'Codystar' => 'Codystar',
    'Combo' => 'Combo',
    'Comfortaa' => 'Comfortaa',
    'Coming Soon' => 'Coming Soon',
    'Condiment' => 'Condiment',
    'Content' => 'Content',
    'Contrail One' => 'Contrail One',
    'Convergence' => 'Convergence',
    'Cookie' => 'Cookie',
    'Comic Sans MS' => 'Comic Sans MS',
    'Copse' => 'Copse',
    'Corben' => 'Corben',
    'Courgette' => 'Courgette',
    'Cousine' => 'Cousine',
    'Coustard' => 'Coustard',
    'Covered By Your Grace' => 'Covered By Your Grace',
    'Crafty Girls' => 'Crafty Girls',
    'Creepster' => 'Creepster',
    'Creepster Caps' => 'Creepster Caps',
    'Crete Round' => 'Crete Round',
    'Crimson' => 'Crimson',
    'Croissant One' => 'Croissant One',
    'Crushed' => 'Crushed',
    'Cuprum' => 'Cuprum',
    'Cutive' => 'Cutive',
    'Cutive Mono' => 'Cutive Mono',
    'Damion' => 'Damion',
    'Dangrek' => 'Dangrek',
    'Dancing Script' => 'Dancing Script',
    'Dawning of a New Day' => 'Dawning of a New Day',
    'Days One' => 'Days One',
    'Dekko' => 'Dekko',
    'Delius' => 'Delius',
    'Delius Swash Caps' => 'Delius Swash Caps',
    'Delius Unicase' => 'Delius Unicase',
    'Della Respira' => 'Della Respira',
    'Denk One' => 'Denk One',
    'Devonshire' => 'Devonshire',
    'Dhurjati' => 'Dhurjati',
    'Didact Gothic' => 'Didact Gothic',
    'Diplomata' => 'Diplomata',
    'Diplomata SC' => 'Diplomata SC',
    'Domine' => 'Domine',
    'Donegal One' => 'Donegal One',
    'Doppio One' => 'Doppio One',
    'Dorsa' => 'Dorsa',
    'Dosis' => 'Dosis',
    'Dr Sugiyama' => 'Dr Sugiyama',
    'Droid Sans' => 'Droid Sans',
    'Droid Sans Mono' => 'Droid Sans Mono',
    'Droid Serif' => 'Droid Serif',
    'Duru Sans' => 'Duru Sans',
    'Dynalight' => 'Dynalight',
    'EB Garamond' => 'EB Garamond',
    'Eczar' => 'Eczar',
    'Eagle Lake' => 'Eagle Lake',
    'Eater' => 'Eater',
    'Eater Caps' => 'Eater Caps',
    'Economica' => 'Economica',
    'Ek Mukta' => 'Ek Mukta',
    'Electrolize' => 'Electrolize',
    'Elsie' => 'Elsie',
    'Elsie Swash Caps' => 'Elsie Swash Caps',
    'Emblema One' => 'Emblema One',
    'Emilys Candy' => 'Emilys Candy',
    'Engagement' => 'Engagement',
    'Englebert' => 'Englebert',
    'Enriqueta' => 'Enriqueta',
    'Erica One' => 'Erica One',
    'Esteban' => 'Esteban',
    'Euphoria Script' => 'Euphoria Script',
    'Ewert' => 'Ewert',
    'Exo' => 'Exo',
    'Exo 2' => 'Exo 2',
    'Expletus Sans' => 'Expletus Sans',
    'Fanwood Text' => 'Fanwood Text',
    'Fascinate' => 'Fascinate',
    'Fascinate Inline' => 'Fascinate Inline',
    'Fasthand' => 'Fasthand',
    'Faster One' => 'Faster One',
    'Federant' => 'Federant',
    'Federo' => 'Federo',
    'Felipa' => 'Felipa',
    'Fenix' => 'Fenix',
    'Finger Paint' => 'Finger Paint',
    'Fira Mono' => 'Fira Mono',
    'Fira Sans' => 'Fira Sans',
    'Fjalla One' => 'Fjalla One',
    'Fjord One' => 'Fjord One',
    'Flamenco' => 'Flamenco',
    'Flavors' => 'Flavors',
    'Fondamento' => 'Fondamento',
    'Fontdiner Swanky' => 'Fontdiner Swanky',
    'Forum' => 'Forum',
    'Francois One' => 'Francois One',
    'FreeSans' => 'FreeSans',

    'Freckle Face' => 'Freckle Face',
    'Fredericka the Great' => 'Fredericka the Great',
    'Fredoka One' => 'Fredoka One',
    'Fresca' => 'Fresca',
    'Freehand' => 'Freehand',
    'Frijole' => 'Frijole',
    'Fruktur' => 'Fruktur',
    'Fugaz One' => 'Fugaz One',
    'Gafata' => 'Gafata',
    'Galdeano' => 'Galdeano',
    'Galindo' => 'Galindo',
    'Gentium Basic' => 'Gentium Basic',
    'Gentium Book Basic' => 'Gentium Book Basic',
    'Geo' => 'Geo',
    'Georgia' => 'Georgia',
    'Geostar' => 'Geostar',
    'Geostar Fill' => 'Geostar Fill',
    'Germania One' => 'Germania One',
    'Gilda Display' => 'Gilda Display',
    'Give You Glory' => 'Give You Glory',
    'Glass Antiqua' => 'Glass Antiqua',
    'Glegoo' => 'Glegoo',
    'Gloria Hallelujah' => 'Gloria Hallelujah',
    'Goblin One' => 'Goblin One',
    'Gochi Hand' => 'Gochi Hand',
    'Gorditas' => 'Gorditas',
    'Gurajada' => 'Gurajada',
    'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
    'Graduate' => 'Graduate',
    'Grand Hotel' => 'Grand Hotel',
    'Gravitas One' => 'Gravitas One',
    'Great Vibes' => 'Great Vibes',
    'Griffy' => 'Griffy',
    'Gruppo' => 'Gruppo',
    'Gudea' => 'Gudea',
    'Gidugu' => 'Gidugu',
    'GFS Didot' => 'GFS Didot',
    'GFS Neohellenic' => 'GFS Neohellenic',
    'Habibi' => 'Habibi',
    'Hammersmith One' => 'Hammersmith One',
    'Halant' => 'Halant',
    'Hanalei' => 'Hanalei',
    'Hanalei Fill' => 'Hanalei Fill',
    'Handlee' => 'Handlee',
    'Hanuman' => 'Hanuman',
    'Happy Monkey' => 'Happy Monkey',
    'Headland One' => 'Headland One',
    'Henny Penny' => 'Henny Penny',
    'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
    'Hind' => 'Hind',
    'Hind Siliguri' => 'Hind Siliguri',
    'Hind Vadodara' => 'Hind Vadodara',
    'Holtwood One SC' => 'Holtwood One SC',
    'Homemade Apple' => 'Homemade Apple',
    'Homenaje' => 'Homenaje',
    'IM Fell' => 'IM Fell',
    'Itim' => 'Itim',
    'Iceberg' => 'Iceberg',
    'Iceland' => 'Iceland',
    'Imprima' => 'Imprima',
    'Inconsolata' => 'Inconsolata',
    'Inder' => 'Inder',
    'Indie Flower' => 'Indie Flower',
    'Inknut Antiqua' => 'Inknut Antiqua',
    'Inika' => 'Inika',
    'Irish Growler' => 'Irish Growler',
    'Istok Web' => 'Istok Web',
    'Italiana' => 'Italiana',
    'Italianno' => 'Italianno',
    'Jacques Francois' => 'Jacques Francois',
    'Jacques Francois Shadow' => 'Jacques Francois Shadow',
    'Jim Nightshade' => 'Jim Nightshade',
    'Jockey One' => 'Jockey One',
    'Jaldi' => 'Jaldi',
    'Jolly Lodger' => 'Jolly Lodger',
    'Josefin Sans' => 'Josefin Sans',
    'Josefin Sans' => 'Josefin Sans',
    'Josefin Slab' => 'Josefin Slab',
    'Joti One' => 'Joti One',
    'Judson' => 'Judson',
    'Julee' => 'Julee',
    'Julius Sans One' => 'Julius Sans One',
    'Junge' => 'Junge',
    'Jura' => 'Jura',
    'Just Another Hand' => 'Just Another Hand',
    'Just Me Again Down Here' => 'Just Me Again Down Here',
    'Kadwa' => 'Kadwa',
    'Kdam Thmor' => 'Kdam Thmor',
    'Kalam' => 'Kalam', 
    'Kameron' => 'Kameron',
    'Kantumruy' => 'Kantumruy',
    'Karma' => 'Karma',
    'Karla' => 'Karla',
    'Kaushan Script' => 'Kaushan Script',
    'Kavoon' => 'Kavoon',
    'Keania One' => 'Keania One',
    'Kelly Slab' => 'Kelly Slab',
    'Kenia' => 'Kenia',
    'Khand' => 'Khand',
    'Khmer' => 'Khmer',
    'Khula' => 'Khula',
    'Kite One' => 'Kite One',
    'Knewave' => 'Knewave',
    'Kotta One' => 'Kotta One',
    'Kranky' => 'Kranky',
    'Kreon' => 'Kreon',
    'Kristi' => 'Kristi',
    'Koulen' => 'Koulen',
    'Krona One' => 'Krona One',
    'Kurale' => 'Kurale',
    'Lakki Reddy' => 'Lakki Reddy',
    'La Belle Aurore' => 'La Belle Aurore',
    'Lancelot' => 'Lancelot',
    'Laila' => 'Laila',
    'Lato' => 'Lato',
    'Lateef' => 'Lateef',
    'League Script' => 'League Script',
    'Leckerli One' => 'Leckerli One',
    'Ledger' => 'Ledger',
    'Lekton' => 'Lekton',
    'Lemon' => 'Lemon',

    'Libre Baskerville' => 'Libre Baskerville',
    'Life Savers' => 'Life Savers',
    'Lilita One' => 'Lilita One',
    'Limelight' => 'Limelight',
    'Linden Hill' => 'Linden Hill',
    'Lobster' => 'Lobster',
    'Lobster Two' => 'Lobster Two',
    'Londrina Outline' => 'Londrina Outline',
    'Londrina Shadow' => 'Londrina Shadow',
    'Londrina Sketch' => 'Londrina Sketch',
    'Londrina Solid' => 'Londrina Solid',
    'Lora' => 'Lora',
    'Love Ya Like A Sister' => 'Love Ya Like A Sister',
    'Loved by the King' => 'Loved by the King',
    'Lovers Quarrel' => 'Lovers Quarrel',
    'Lucida Sans Unicode' => 'Lucida Sans Unicode',
    'Luckiest Guy' => 'Luckiest Guy',
    'Lusitana' => 'Lusitana',
    'Lustria' => 'Lustria',
    'Macondo' => 'Macondo',
    'Macondo Swash Caps' => 'Macondo Swash Caps',
    'Magra' => 'Magra',
    'Maiden Orange' => 'Maiden Orange',
    'Mallanna' => 'Mallanna',
    'Mandali' => 'Mandali',
    'Mako' => 'Mako',
    'Marcellus' => 'Marcellus',
    'Marcellus SC' => 'Marcellus SC',
    'Marck Script' => 'Marck Script',
    'Margarine' => 'Margarine',
    'Marko One' => 'Marko One',
    'Marmelad' => 'Marmelad',
    'Marvel' => 'Marvel',
    'Martel' => 'Martel',
    'Martel Sans' => 'Martel Sans',
    'Mate' => 'Mate',
    'Mate SC' => 'Mate SC',
    'Maven Pro' => 'Maven Pro',
    'McLaren' => 'McLaren',
    'Meddon' => 'Meddon',
    'MedievalSharp' => 'MedievalSharp',
    'Medula One' => 'Medula One',
    'Megrim' => 'Megrim',
    'Meie Script' => 'Meie Script',
    'Merienda' => 'Merienda',
    'Merienda One' => 'Merienda One',
    'Merriweather' => 'Merriweather',
    'Metal' => 'Metal',
    'Metal Mania' => 'Metal Mania',
    'Metamorphous' => 'Metamorphous',
    'Metrophobic' => 'Metrophobic',
    'Michroma' => 'Michroma',
    'Milonga' => 'Milonga',
    'Miltonian' => 'Miltonian',
    'Miltonian Tattoo' => 'Miltonian Tattoo',
    'Miniver' => 'Miniver',
    'Miss Fajardose' => 'Miss Fajardose',
    'Miss Saint Delafield' => 'Miss Saint Delafield',
    'Modak' => 'Modak',
    'Modern Antiqua' => 'Modern Antiqua',
    'Molengo' => 'Molengo',
    'Molle' => 'Molle',
    'Moulpali' => 'Moulpali',
    'Monda' => 'Monda',
    'Monofett' => 'Monofett',
    'Monoton' => 'Monoton',
    'Monsieur La Doulaise' => 'Monsieur La Doulaise',
    'Montaga' => 'Montaga',
    'Montez' => 'Montez',
    'Montserrat' => 'Montserrat',
    'Montserrat Alternates' => 'Montserrat Alternates',
    'Montserrat Subrayada' => 'Montserrat Subrayada',
    'Mountains of Christmas' => 'Mountains of Christmas',
    'Mouse Memoirs' => 'Mouse Memoirs',
    'Moul' => 'Moul',
    'Mr Bedford' => 'Mr Bedford',
    'Mr Bedfort' => 'Mr Bedfort',
    'Mr Dafoe' => 'Mr Dafoe',
    'Mr De Haviland' => 'Mr De Haviland',
    'Mrs Saint Delafield' => 'Mrs Saint Delafield',
    'Mrs Sheppards' => 'Mrs Sheppards',
    'Muli' => 'Muli',
    'Mystery Quest' => 'Mystery Quest',
    'Neucha' => 'Neucha',
    'Neuton' => 'Neuton',
    'New Rocker' => 'New Rocker',
    'News Cycle' => 'News Cycle',
    'Niconne' => 'Niconne',
    'Nixie One' => 'Nixie One',
    'Nobile' => 'Nobile',
    'Nokora' => 'Nokora',
    'Norican' => 'Norican',
    'Nosifer' => 'Nosifer',
    'Nosifer Caps' => 'Nosifer Caps',
    'Nova Mono' => 'Nova Mono',
    'Noticia Text' => 'Noticia Text',
    'Noto Sans' => 'Noto Sans',
    'Noto Serif' => 'Noto Serif',
    'Nova Round' => 'Nova Round',
    'Numans' => 'Numans',
    'Nunito' => 'Nunito',
    'NTR' => 'NTR',
    'Offside' => 'Offside',
    'Oldenburg' => 'Oldenburg',
    'Oleo Script' => 'Oleo Script',
    'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
    'Open Sans' => 'Open Sans',
    'Open Sans Condensed' => 'Open Sans Condensed',
    'Oranienbaum' => 'Oranienbaum',
    'Orbitron' => 'Orbitron',
    'Odor Mean Chey' => 'Odor Mean Chey',
    'Oregano' => 'Oregano',
    'Orienta' => 'Orienta',
    'Original Surfer' => 'Original Surfer',
    'Oswald' => 'Oswald',
    'Over the Rainbow' => 'Over the Rainbow',
    'Overlock' => 'Overlock',
    'Overlock SC' => 'Overlock SC',
    'Ovo' => 'Ovo',
    'Oxygen' => 'Oxygen',
    'Oxygen Mono' => 'Oxygen Mono',
    'Palanquin Dark' => 'Palanquin Dark',
    'Peddana' => 'Peddana',
    'Poppins' => 'Poppins',
    'PT Mono' => 'PT Mono',
    'PT Sans' => 'PT Sans',
    'PT Sans Caption' => 'PT Sans Caption',
    'PT Sans Narrow' => 'PT Sans Narrow',
    'PT Serif' => 'PT Serif',
    'PT Serif Caption' => 'PT Serif Caption',
    'Pacifico' => 'Pacifico',
    'Paprika' => 'Paprika',
    'Parisienne' => 'Parisienne',
    'Passero One' => 'Passero One',
    'Passion One' => 'Passion One',
    'Patrick Hand' => 'Patrick Hand',
    'Patrick Hand SC' => 'Patrick Hand SC',
    'Patua One' => 'Patua One',
    'Paytone One' => 'Paytone One',
    'Peralta' => 'Peralta',
    'Permanent Marker' => 'Permanent Marker',
    'Petit Formal Script' => 'Petit Formal Script',
    'Petrona' => 'Petrona',
    'Philosopher' => 'Philosopher',
    'Piedra' => 'Piedra',
    'Pinyon Script' => 'Pinyon Script',
    'Pirata One' => 'Pirata One',
    'Plaster' => 'Plaster',
    'Palatino Linotype' => 'Palatino Linotype',
    'Play' => 'Play',
    'Playball' => 'Playball',
    'Playfair Display' => 'Playfair Display',
    'Playfair Display SC' => 'Playfair Display SC',
    'Podkova' => 'Podkova',
    'Poiret One' => 'Poiret One',
    'Poller One' => 'Poller One',
    'Poly' => 'Poly',
    'Pompiere' => 'Pompiere',
    'Pontano Sans' => 'Pontano Sans',
    'Port Lligat Sans' => 'Port Lligat Sans',
    'Port Lligat Slab' => 'Port Lligat Slab',
    'Prata' => 'Prata',
    'Pragati Narrow' => 'Pragati Narrow',
    'Preahvihear' => 'Preahvihear',
    'Press Start 2P' => 'Press Start 2P',
    'Princess Sofia' => 'Princess Sofia',
    'Prociono' => 'Prociono',
    'Prosto One' => 'Prosto One',
    'Puritan' => 'Puritan',
    'Purple Purse' => 'Purple Purse',
    'Quando' => 'Quando',
    'Quantico' => 'Quantico',
    'Quattrocento' => 'Quattrocento',
    'Quattrocento Sans' => 'Quattrocento Sans',
    'Questrial' => 'Questrial',
    'Quicksand' => 'Quicksand',
    'Quintessential' => 'Quintessential',
    'Qwigley' => 'Qwigley',
    'Racing Sans One' => 'Racing Sans One',
    'Radley' => 'Radley',
    'Rajdhani' => 'Rajdhani',
    'Raleway Dots' => 'Raleway Dots',
    'Raleway' => 'Raleway',
    'Rambla' => 'Rambla',
    'Ramabhadra' => 'Ramabhadra',
    'Ramaraja' => 'Ramaraja',
    'Rammetto One' => 'Rammetto One',
    'Ranchers' => 'Ranchers',
    'Rancho' => 'Rancho',
    'Ranga' => 'Ranga',
    'Ravi Prakash' => 'Ravi Prakash',
    'Rationale' => 'Rationale',
    'Redressed' => 'Redressed',
    'Reenie Beanie' => 'Reenie Beanie',
    'Revalia' => 'Revalia',
    'Rhodium Libre' => 'Rhodium Libre',
    'Ribeye' => 'Ribeye',
    'Ribeye Marrow' => 'Ribeye Marrow',
    'Righteous' => 'Righteous',
    'Risque' => 'Risque',
    'Roboto' => 'Roboto',
    'Roboto Condensed' => 'Roboto Condensed',
    'Roboto Mono' => 'Roboto Mono',
    'Roboto Slab' => 'Roboto Slab',
    'Rochester' => 'Rochester',
    'Rock Salt' => 'Rock Salt',
    'Rokkitt' => 'Rokkitt',
    'Romanesco' => 'Romanesco',
    'Ropa Sans' => 'Ropa Sans',
    'Rosario' => 'Rosario',
    'Rosarivo' => 'Rosarivo',
    'Rouge Script' => 'Rouge Script',
    'Rozha One' => 'Rozha One',
    'Rubik' => 'Rubik',
    'Rubik One' => 'Rubik One',
    'Rubik Mono One' => 'Rubik Mono One',
    'Ruda' => 'Ruda',
    'Rufina' => 'Rufina',
    'Ruge Boogie' => 'Ruge Boogie',
    'Ruluko' => 'Ruluko',
    'Rum Raisin' => 'Rum Raisin',
    'Ruslan Display' => 'Ruslan Display',
    'Russo One' => 'Russo One',
    'Ruthie' => 'Ruthie',
    'Rye' => 'Rye',
    'Sacramento' => 'Sacramento',
    'Sail' => 'Sail',
    'Salsa' => 'Salsa',
    'Sanchez' => 'Sanchez',
    'Sancreek' => 'Sancreek',
    'Sahitya' => 'Sahitya',
    'Sansita One' => 'Sansita One',
    'Sarpanch' => 'Sarpanch',
    'Sarina' => 'Sarina',
    'Satisfy' => 'Satisfy',
    'Scada' => 'Scada',
    'Scheherazade' => 'Scheherazade',
    'Schoolbell' => 'Schoolbell',
    'Seaweed Script' => 'Seaweed Script',
    'Sarala' => 'Sarala',
    'Sevillana' => 'Sevillana',
    'Seymour One' => 'Seymour One',
    'Shadows Into Light' => 'Shadows Into Light',
    'Shadows Into Light Two' => 'Shadows Into Light Two',
    'Shanti' => 'Shanti',
    'Share' => 'Share',
    'Share Tech' => 'Share Tech',
    'Share Tech Mono' => 'Share Tech Mono',
    'Shojumaru' => 'Shojumaru',
	'Showcard Gothic' => 'Showcard Gothic',
    'Short Stack' => 'Short Stack',
    'Sigmar One' => 'Sigmar One',
    'Suranna' => 'Suranna',
    'Suravaram' => 'Suravaram',
    'Suwannaphum' => 'Suwannaphum',
    'Signika' => 'Signika',
    'Signika Negative' => 'Signika Negative',
    'Simonetta' => 'Simonetta',
    'Siemreap' => 'Siemreap',
    'Sirin Stencil' => 'Sirin Stencil',
    'Six Caps' => 'Six Caps',
    'Skranji' => 'Skranji',
    'Slackey' => 'Slackey',
    'Smokum' => 'Smokum',
    'Smythe' => 'Smythe',
    'Sniglet' => 'Sniglet',
    'Snippet' => 'Snippet',
    'Snowburst One' => 'Snowburst One',
    'Sofadi One' => 'Sofadi One',
    'Sofia' => 'Sofia',
    'Sonsie One' => 'Sonsie One',
    'Sorts Mill Goudy' => 'Sorts Mill Goudy',
    'Sorts Mill Goudy' => 'Sorts Mill Goudy',
    'Source Code Pro' => 'Source Code Pro',
    'Source Sans Pro' => 'Source Sans Pro',
    'Special I am one' => 'Special I am one',
    'Spicy Rice' => 'Spicy Rice',
    'Spinnaker' => 'Spinnaker',
    'Spirax' => 'Spirax',
    'Squada One' => 'Squada One',
    'Sree Krushnadevaraya' => 'Sree Krushnadevaraya',
    'Stalemate' => 'Stalemate',
    'Stalinist One' => 'Stalinist One',
    'Stardos Stencil' => 'Stardos Stencil',
    'Stint Ultra Condensed' => 'Stint Ultra Condensed',
    'Stint Ultra Expanded' => 'Stint Ultra Expanded',
    'Stoke' => 'Stoke',
    'Stoke' => 'Stoke',
    'Strait' => 'Strait',
    'Sura' => 'Sura',
    'Sumana' => 'Sumana',
    'Sue Ellen Francisco' => 'Sue Ellen Francisco',
    'Sunshiney' => 'Sunshiney',
    'Supermercado One' => 'Supermercado One',
    'Swanky and Moo Moo' => 'Swanky and Moo Moo',
    'Syncopate' => 'Syncopate',
    'Symbol' => 'Symbol',
    'Timmana' => 'Timmana',
    'Taprom' => 'Taprom',
    'Tangerine' => 'Tangerine',
    'Tahoma' => 'Tahoma',
    'Teko' => 'Teko',
    'Telex' => 'Telex',
    'Tenali Ramakrishna' => 'Tenali Ramakrishna',
    'Tenor Sans' => 'Tenor Sans',
    'Terminal Dosis' => 'Terminal Dosis',
    'Terminal Dosis Light' => 'Terminal Dosis Light',
    'Text Me One' => 'Text Me One',
    'The Girl Next Door' => 'The Girl Next Door',
    'Tienne' => 'Tienne',
    'Tillana' => 'Tillana',
    'Tinos' => 'Tinos',
    'Titan One' => 'Titan One',
    'Titillium Web' => 'Titillium Web',
    'Trade Winds' => 'Trade Winds',
    'Trebuchet MS' => 'Trebuchet MS',
    'Trocchi' => 'Trocchi',
    'Trochut' => 'Trochut',
    'Trykker' => 'Trykker',
    'Tulpen One' => 'Tulpen One',
    'Ubuntu' => 'Ubuntu',
    'Ubuntu Condensed' => 'Ubuntu Condensed',
    'Ubuntu Mono' => 'Ubuntu Mono',
    'Ultra' => 'Ultra',
    'Uncial Antiqua' => 'Uncial Antiqua',
    'Underdog' => 'Underdog',
    'Unica One' => 'Unica One',
    'UnifrakturCook' => 'UnifrakturCook',
    'UnifrakturMaguntia' => 'UnifrakturMaguntia',
    'Unkempt' => 'Unkempt',
    'Unlock' => 'Unlock',
    'Unna' => 'Unna',
    'VT323' => 'VT323',
    'Vampiro One' => 'Vampiro One',
    'Varela' => 'Varela',
    'Varela Round' => 'Varela Round',
    'Vast Shadow' => 'Vast Shadow',
    'Vesper Libre' => 'Vesper Libre',
    'Verdana' => 'Verdana',
    'Vibur' => 'Vibur',
    'Vidaloka' => 'Vidaloka',
    'Viga' => 'Viga',
    'Voces' => 'Voces',
    'Volkhov' => 'Volkhov',
    'Vollkorn' => 'Vollkorn',
    'Voltaire' => 'Voltaire',
    'Waiting for the Sunrise' => 'Waiting for the Sunrise',
    'Wallpoet' => 'Wallpoet',
    'Walter Turncoat' => 'Walter Turncoat',
    'Warnes' => 'Warnes',
    'Wellfleet' => 'Wellfleet',
    'Wendy One' => 'Wendy One',
    'Wire One' => 'Wire One',
    'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    'Yantramanav' => 'Yantramanav',
    'Yellowtail' => 'Yellowtail',
    'Yeseva One' => 'Yeseva One',
    'Yesteryear' => 'Yesteryear',
    'Zeyada' => 'Zeyada'
  );

	//array of all font sizes.
	$font_sizes = array( 
		'10px' => '10px',
		'11px' => '11px',
	);
	
	$options = array();
	$imagepath =  get_template_directory_uri() . '/images/';

	
	for($n=12;$n<=200;$n+=1){
		$font_sizes[$n.'px'] = $n.'px';
	}
	
	// Pull all the pages into an array
	 $options_pages = array();
	 $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	 $options_pages[''] = 'Select a page:';
	 foreach ($options_pages_obj as $page) {
	  $options_pages[$page->ID] = $page->post_title;
	 }

	// array of section content.
	$section_text = array(	
			1 => array(
			'section_title'	=> 'Sports Club Features',
			'menutitle'		=> 'section1',
			'bgcolor' 		=> '#eff0f0',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[row_area][featuresbox icon="'.get_template_directory_uri().'/images/feature-icon01.png" title="League Cup" description="Nam fermentum ullamcor per luctus. Integer ultricies imperdiet rutrum. " readmore="READ MORE" link="#" bgcolor="#ffffff"][featuresbox icon="'.get_template_directory_uri().'/images/feature-icon02.png" title="Championship " description="Nam fermentum ullamcor per luctus. Integer ultricies imperdiet rutrum. " readmore="READ MORE" link="#" bgcolor="#ffffff"][featuresbox icon="'.get_template_directory_uri().'/images/feature-icon03.png" title="Associations" description="Nam fermentum ullamcor per luctus. Integer ultricies imperdiet rutrum. " readmore="READ MORE" link="#" bgcolor="#ffffff"][featuresbox icon="'.get_template_directory_uri().'/images/feature-icon04.png" title="Trophies" description="Nam fermentum ullamcor per luctus. Integer ultricies imperdiet rutrum. " readmore="READ MORE" link="#" bgcolor="#ffffff"][/row_area]',
		),
		
		2 => array(
			'section_title'	=> 'Latest Results',
			'menutitle'		=> 'section2',
			'bgcolor' 		=> '#280434',
			'bgimage'		=> get_template_directory_uri().'/images/sectionbg01.jpg',
			'class'			=> '',
			'content'		=> '[column_content type="one_half"][latest_results matchdate="MON, OCT 21, YOUTH LEAGUE" teamicon1="'.get_template_directory_uri().'/images/team1.png" teamicon2="'.get_template_directory_uri().'/images/team2.png" teamscore1="3 Turkey" teamscore2="2 NFL" readmore="GAME DETAILS" link="#" bgcolor="#ffffff"][/column_content][column_content type="one_half_last"][latest_results matchdate="MON, OCT 21, YOUTH LEAGUE" teamicon1="'.get_template_directory_uri().'/images/team4.png" teamicon2="'.get_template_directory_uri().'/images/team3.png" teamscore1="1 NOL" teamscore2="0 NFL" readmore="GAME DETAILS" link="#" bgcolor="#ffffff"][/column_content]',
		),
		
		
		3 => array(
			'section_title'	=> 'Most Notable Videos',
			'menutitle'		=> 'section3',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[row_area][most_video youtubeid="VvzMQEWGW2A" image="'.get_template_directory_uri().'/images/most-video-1.jpg" title="Rugby League" description="Nam fermentum ullamcor per luctus. Integer iet rutrum."][most_video youtubeid="FzhEJpJ-sLc" image="'.get_template_directory_uri().'/images/most-video-2.jpg" title="IPL 2019" description="Nam fermentum ullamcor per luctus. Integer iet rutrum."][most_video youtubeid="W0nz0Pmdq8c" image="'.get_template_directory_uri().'/images/most-video-3.jpg" title="Premier League" description="Nam fermentum ullamcor per luctus. Integer iet rutrum."][most_video youtubeid="J-BsqpR2Y30" image="'.get_template_directory_uri().'/images/most-video-4.jpg" title="Acapulco 2019" description="Nam fermentum ullamcor per luctus. Integer iet rutrum."][most_video youtubeid="GBIbO5FwgEM" image="'.get_template_directory_uri().'/images/most-video-5.jpg" title="Badminton Trickshots" description="Nam fermentum ullamcor per luctus. Integer iet rutrum."][most_video youtubeid="b99Tz8JVe9s" image="'.get_template_directory_uri().'/images/most-video-6.jpg" title="NBA Highlights" description="Nam fermentum ullamcor per luctus. Integer iet rutrum."][/row_area]'
		),
		
		4 => array(
			'section_title'	=> '',
			'menutitle'		=> 'section4',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[column_content type="one_half"]<div class="nextmatch"><div class="nextmatch-sep"><h6 class="next-title">NEXT MATCH</h6><h5 class="more-info"><a href="#">MORE INFO</a></h5><h5 class="location-map"><a href="#">LOCATION MAP</a></h5><div class="clear"></div><h3>TEAM 01 <span>North</span></h3><h4>VS</h4>		<h3>TEAM 02 <span>Sheffield</span></h3><div class="clear"></div></div></div>[/column_content][column_content type="one_half_last"]<h6>20:00, 25 DEC 2019</h6>[countdown count="1" year="2019" month="12" date="25" color="#ffffff"][/column_content]',
		),
		
		5 => array(
			'section_title'	=> 'Upcoming Match',
			'menutitle'		=> 'section5',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> get_template_directory_uri().'/images/sectionbg05.jpg',
			'class'			=> '',
			'content'		=> '[column_content type="one_half"][upcomingmatch month="JAN" date="27" title="WALES Vs ITALY" matchtype="Central Park" readmore="Read More" url="#" target="_self" bgcolor="#ffffff"][upcomingmatch month="FEB" date="03" title="IRELAND Vs SCOTLAND" matchtype="Northampton" readmore="Read More" url="#" target="_self" bgcolor="#ffffff"][upcomingmatch month="MAR" date="12" title="FRANCE Vs IRELAND" matchtype="Port Elizabeth" readmore="Read More" url="#" target="_self" bgcolor="#ffffff"][upcomingmatch month="AUG" date="18" title="ENGLAND Vs IRELAND" matchtype="Dublin" readmore="Read More" url="#" target="_self" bgcolor="#ffffff"][upcomingmatch month="DEC" date="10" title="FRANCE Vs SCOTLAND" matchtype="Edinburgh" readmore="Read More" url="#" target="_self" bgcolor="#ffffff"][button align="center" name="VIEW ALL" link="#" target="_self"][/column_content]'
		),
		
		6 => array(
			'section_title'	=> 'Our Coaches',
			'menutitle'		=> 'section6',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=>  '',
			'class'			=> '',
			'content'		=> '[subtitle color="#747373" size="15px" description="Nam fermentum ullamcorper luctus. Integer ultricies imperdiet rutrum. Donec vel ultrices purus. Vestibulum posuere eget magna eu blandit. Sed fermentum, est ut tincidunt luctus, urna tell"][space height="20px"][our-team show="-1"]',
		),	
				
		7 => array(
			'section_title'	=> '',
			'menutitle'		=> 'section7',
			'bgcolor' 		=> ' ',
			'bgimage'		=> get_template_directory_uri().'/images/sectionbg07.jpg',
			'class'			=> '',
			'content'		=> '[innertitle size="55px" color="#ffffff" fontweight="900" description="Become A Part Of Soccer"][innertitle size="55px" color="#ffffff" fontweight="900" description="Team Community"][space height="20px"][subtitle color="#ffffff" size="15px" description="Nam fermentum ullamcorper luctus. Integer ultricies imperdiet rutrum. Donec vel ultrices purus. Vestibulum posuere eget magna eu blandit. Sed fermentum, est ut tincidunt luctus, urna tell"][space height="10px"][button align="center" name="JOIN US" link="#" target="_self"][button align="center" name="VIEW PLANS" link="#" target="_self"]'
		),	
		
		
		8 => array(
			'section_title'	=> 'Sport News',
			'menutitle'		=> 'section8',
			'bgcolor' 		=> '#eff0f0',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[subtitle color="#747373" size="15px" description="Nam fermentum ullamcorper luctus. Integer ultricies imperdiet rutrum. Donec vel ultrices purus. Vestibulum posuere eget magna eu blandit. Sed fermentum, est ut tincidunt luctus, urna tell"][latest-news showposts="4" date="show" comment="no" author="no" readmore="READ MORE" excerptlength="15"]',
		),
 	
		
		9 => array(
			'section_title'	=> 'Latest Video',
			'menutitle'		=> 'section9',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> get_template_directory_uri().'/images/sectionbg09.jpg',
			'class'			=> '',
			'content'		=> '[subtitle color="#747373" size="15px" description="Nam fermentum ullamcorper luctus. Integer ultricies imperdiet rutrum. Donec vel ultrices purus. Vestibulum posuere eget magna eu blandit. Sed fermentum, est ut tincidunt luctus, urna tell"][custom-video youtubeid="eCI2gIXnRts" image="'.get_template_directory_uri().'/images/video-cover1.jpg"]',
		),		
			
		10 => array(
			'section_title'	=> 'Awards',
			'menutitle'		=> 'section10',
			'bgcolor' 		=> '#f5f5f5',
			'bgimage'		=>  '',
			'class'			=> '',
			'content'		=> '[subtitle color="#747373" size="15px" description="Nam fermentum ullamcorper luctus. Integer ultricies imperdiet rutrum. Donec vel ultrices purus. Vestibulum posuere eget magna eu blandit. Sed fermentum, est ut tincidunt luctus, urna tell"][awards_lists][award icon="'.get_template_directory_uri().'/images/awards1.png" title="True Sport Award" link="#"][award icon="'.get_template_directory_uri().'/images/awards2.png" title="Football West" link="#"][award icon="'.get_template_directory_uri().'/images/awards3.png" title="Innovation Award" link="#"][award icon="'.get_template_directory_uri().'/images/awards4.png" title="Excellence Award" link="#"][award icon="'.get_template_directory_uri().'/images/awards5.png" title="Netball WA" link="#"][award icon="'.get_template_directory_uri().'/images/awards3.png" title="Volunteers Award" link="#"][/awards_lists]'
		),
	);

	$options = array();

	//Basic Settings
	$options[] = array(
		'name' => __('Basic Settings', 'sports-club'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'sports-club'),
		'desc' => __('Upload your main logo here', 'sports-club'),
		'id' => 'logo',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/logo.png",
		'type' => 'upload');
		
	$options[] = array(		
		'desc' => __('Change your custom logo height', 'sports-club'),
		'id' => 'logoheight',
		'std' => '43',
		'type' => 'text');
		
	$options[] = array(	
		'name' => __('Site title & Description', 'sports-club'),		
		'desc'	=> __('Uncheck to show site title and description', 'sports-club'),
		'id'	=> 'hide_titledesc',
		'type'	=> 'checkbox',
		'std'	=> 'true');		
		
	$options[] = array(	
		'name' => __('Layout Option', 'sports-club'),		
		'desc'	=> __('Check To Show Box Layout ', 'sports-club'),
		'id'	=> 'boxlayout',
		'type'	=> 'checkbox',
		'std'	=> '');
			
	$options[] = array(
		'name' => __('Sticky Header', 'sports-club'),
		'desc' => __('Check this to show sticky header on scroll', 'sports-club'),
		'id' => 'headstick',
		'std' => '',
		'type' => 'checkbox');		
			
	$options[] = array(
		'name' => __('Disable Animation', 'sports-club'),
		'desc' => __('Check this to hide animation on scroll', 'sports-club'),
		'id' => 'scrollanimation',
		'std' => '',
		'type' => 'checkbox');		

	$options[] = array(
		'name' => __('Custom CSS', 'sports-club'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'sports-club'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Header Social Icons & Email', 'sports-club'),
		'desc' => __('Header Right Social Icon', 'sports-club'),
		'id' => 'headerinfobutton',
		'std' => '[social_area]
[social icon="fab fa-facebook-f" link="#"]
[social icon="fab fa-twitter" link="#"]
[social icon="fab fa-linkedin-in" link="#"]
[social icon="fab fa-google-plus-g" link="#"]
[/social_area]',
		'type' => 'textarea');		
		
	$options[] = array(
		'desc' => __('add header right email', 'sports-club'),
		'id' => 'headerinfoemail',
		'std' => '<i class="fas fa-envelope"></i><span><a href="mailto:info@youremailhere.com">info@youremailhere.com</a></span>',
		'type' => 'textarea');		

	$options[] = array(			
			'desc'	=> __('Check to hide header social icon and email', 'sports-club'),
			'id'	=> 'hidelogoright',
			'type'	=> 'checkbox',
			'std'	=> '');

	// font family start 		
	$options[] = array(
		'name' => __('Font Faces', 'sports-club'),
		'desc' => __('Select font for the body text', 'sports-club'),
		'id' => 'bodyfontface',
		'type' => 'select',
		'std' => 'Open Sans',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the textual logo', 'sports-club'),
		'id' => 'logofontface',
		'type' => 'select',
		'std' => 'Roboto Condensed',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the navigation text', 'sports-club'),
		'id' => 'navfontface',
		'type' => 'select',
		'std' => 'Open Sans',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font family for all heading tag.', 'sports-club'),
		'id' => 'headfontface',
		'type' => 'select',
		'std' => 'Roboto Condensed',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for Section title', 'sports-club'),
		'id' => 'sectiontitlefontface',
		'type' => 'select',
		'std' => 'Roboto Condensed',
		'options' => $font_types );		
			
	$options[] = array(
		'desc' => __('Select font for Slide title', 'sports-club'),
		'id' => 'slidetitlefontface',
		'type' => 'select',
		'std' => 'Roboto Condensed',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font for Slide Description', 'sports-club'),
		'id' => 'slidedesfontface',
		'type' => 'select',
		'std' => 'Open Sans',
		'options' => $font_types );	
		
	// font sizes start	
	$options[] = array(
		'name' => __('Font Sizes', 'sports-club'),
		'desc' => __('Select font size for body text', 'sports-club'),
		'id' => 'bodyfontsize',
		'type' => 'select',
		'std' => '15px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for textual logo', 'sports-club'),
		'id' => 'logofontsize',
		'type' => 'select',
		'std' => '35px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for navigation', 'sports-club'),
		'id' => 'navfontsize',
		'type' => 'select',
		'std' => '14px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for section title', 'sports-club'),
		'id' => 'sectitlesize',
		'type' => 'select',
		'std' => '38px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for footer title', 'sports-club'),
		'id' => 'ftfontsize',
		'type' => 'select',
		'std' => '25px',
		'options' => $font_sizes );	

	$options[] = array(
		'desc' => __('Select h1 font size', 'sports-club'),
		'id' => 'h1fontsize',
		'std' => '30px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h2 font size', 'sports-club'),
		'id' => 'h2fontsize',
		'std' => '28px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h3 font size', 'sports-club'),
		'id' => 'h3fontsize',
		'std' => '18px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h4 font size', 'sports-club'),
		'id' => 'h4fontsize',
		'std' => '22px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h5 font size', 'sports-club'),
		'id' => 'h5fontsize',
		'std' => '20px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h6 font size', 'sports-club'),
		'id' => 'h6fontsize',
		'std' => '18px',
		'type' => 'select',
		'options' => $font_sizes);


	// font colors start

	$options[] = array(
		'name' => __('Site Colors Scheme', 'sports-club'),
		'desc' => __('Change the color scheme of hole site', 'sports-club'),
		'id' => 'colorscheme',
		'std' => '#ec4613',
		'type' => 'color');
		
	$options[] = array(			
		'desc' => __('Select Second color of hover', 'sports-club'),
		'id' => 'colorscheme_hover',
		'std' => '#8f2817',
		'type' => 'color');		
		
	$options[] = array(	
		'name' => __('Font Colors', 'sports-club'),	
		'desc' => __('Select font color for the body text', 'sports-club'),
		'id' => 'bodyfontcolor',
		'std' => '#373735',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for header top phone and email strip', 'sports-club'),
		'id' => 'headertopfontcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for logo', 'sports-club'),
		'id' => 'logofontcolor',
		'std' => '#282828',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for logo tagline', 'sports-club'),
		'id' => 'logotaglinecolor',
		'std' => '#282828',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for header social icons', 'sports-club'),
		'id' => 'socialfontcolor',
		'std' => '#8b929d',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for section title', 'sports-club'),
		'id' => 'sectitlecolor',
		'std' => '#222222',
		'type' => 'color');			
	
	$options[] = array(
		'desc' => __('Select font color for navigation', 'sports-club'),
		'id' => 'navfontcolor',
		'std' => '#4d4d4d',
		'type' => 'color');
	
	$options[] = array(
		'desc' => __('Select font color for navigation active', 'sports-club'),
		'id' => 'navfontactcolor',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select font color for homepage top five box title', 'sports-club'),
		'id' => 'hometopfourbxtitlecolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for widget title', 'sports-club'),
		'id' => 'wdgttitleccolor',
		'std' => '#444444',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer title', 'sports-club'),
		'id' => 'foottitlecolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer', 'sports-club'),
		'id' => 'footdesccolor',
		'std' => '#ababab',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer right text (design by)', 'sports-club'),
		'id' => 'designcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font hover color for links / anchor tags', 'sports-club'),
		'id' => 'linkhovercolor',
		'std' => '#282828',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for sidebar li a', 'sports-club'),
		'id' => 'sidebarfontcolor',
		'std' => '#78797c',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for footer copyright links', 'sports-club'),
		'id' => 'copylinkshover',
		'std' => '#ababab',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h1 font color', 'sports-club'),
		'id' => 'h1fontcolor',
		'std' => '#272727',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select h2 font color', 'sports-club'),
		'id' => 'h2fontcolor',
		'std' => '#272727',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h3 font color', 'sports-club'),
		'id' => 'h3fontcolor',
		'std' => '#272727',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h4 font color', 'sports-club'),
		'id' => 'h4fontcolor',
		'std' => '#272727',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h5 font color', 'sports-club'),
		'id' => 'h5fontcolor',
		'std' => '#272727',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h6 font color', 'sports-club'),
		'id' => 'h6fontcolor',
		'std' => '#272727',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer social icons', 'sports-club'),
		'id' => 'footsocialcolor',
		'std' => '#646464',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for gallery filter ', 'sports-club'),
		'id' => 'galleryfiltercolor',
		'std' => '#111111',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for photogallery title ', 'sports-club'),
		'id' => 'gallerytitlecolorhv',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for client testimonilas description', 'sports-club'),
		'id' => 'testimonialdescriptioncolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for sidebar widget box', 'sports-club'),
		'id' => 'widgetboxfontcolor',
		'std' => '#6e6d6d',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer recent posts title', 'sports-club'),
		'id' => 'footerpoststitlecolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for toggle menu on responsive', 'sports-club'),
		'id' => 'togglemenucolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	// Background start			
	$options[] = array(
		'name' => __('Background Colors', 'sports-club'),		
		'desc' => __('Select background color for site header top strip', 'sports-club'),
		'id' => 'headertopbgcolor',
		'std' => '#000000',
		'type' => 'color');
	
	$options[] = array(
		'desc' => __('Select background color for site header', 'sports-club'),
		'id' => 'headerbgcolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for footer', 'sports-club'),
		'id' => 'footerbgcolor',
		'std' => '#262a31',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for footer copyright', 'sports-club'),
		'id' => 'copybgcolor',
		'std' => 'none',
		'type' => 'color');	
		
		
	$options[] = array(
		'desc' => __('Select background color for client testimonials pager dots', 'sports-club'),
		'id' => 'testidotsbgcolor',
		'std' => '#ffffff',
		'type' => 'color');	
	
	$options[] = array(
		'desc' => __('Select background color for sidebar widget box', 'sports-club'),
		'id' => 'widgetboxbgcolor',
		'std' => '#F0EFEF',
		'type' => 'color');	
					

	// Border colors			
	$options[] = array(	
		'name' => __('Border Colors', 'sports-club'),		
		'desc' => __('Select border color for sidebar li a', 'sports-club'),
		'id' => 'sidebarliaborder',
		'std' => '#d0cfcf',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for top navigation dropdown li', 'sports-club'),
		'id' => 'navlibdcolor',
		'std' => '#e4e3e3',
		'type' => 'color');

	// Default Buttons		
	$options[] = array(
		'name' => __('Button Colors', 'sports-club'),
		'desc' => __('Select background hover color for default button', 'sports-club'),
		'id' => 'btnbghvcolor',
		'std' => '#555555',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select font color default button', 'sports-club'),
		'id' => 'btntxtcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font hover color for default button', 'sports-club'),
		'id' => 'btntxthvcolor',
		'std' => '#ffffff',
		'type' => 'color');						

	// Slider Caption colors
	$options[] = array(	
		'name' => __('Slider Caption Colors', 'sports-club'),				
		'desc' => __('Select font color for slider title', 'sports-club'),
		'id' => 'slidetitlecolor',
		'std' => '#ffffff',
		'type' => 'color');			
		
	$options[] = array(		
		'desc' => __('Select font color for slider description', 'sports-club'),
		'id' => 'slidedesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font size for slider title', 'sports-club'),
		'id' => 'slidetitlefontsize',
		'type' => 'select',
		'std' => '50px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for slider description', 'sports-club'),
		'id' => 'slidedescfontsize',
		'type' => 'select',
		'std' => '18px',
		'options' => $font_sizes );
		
	// Slider controls colors		
	$options[] = array(
		'name' => __('Slider controls Colors', 'sports-club'),
		'desc' => __('Select background color for slider pager (dots)', 'sports-club'),
		'id' => 'sldpagebg',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select background color for slider caption ', 'sports-club'),
		'id' => 'slidercaptionbg',
		'std' => '#080808',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select background opacity color for header slider caption', 'sports-club'),
		'id' => 'captionopacity',
		'std' => '0.5',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,'0.1'=>0.1,'0.0'=>0.0,));			
		 
		
	$options[] = array(	
		'name' => __('Excerpt Lenth', 'sports-club'),			
		'desc' => __('Select excerpt length for testimonials section', 'sports-club'),
		'id' => 'testimonialsexcerptlength',
		'std' => '15',
		'type' => 'text');

	$options[] = array(		
		'desc' => __('Select excerpt length for blog templates posts', 'sports-club'),
		'id' => 'blogpostexcerptlength',
		'std' => '25',
		'type' => 'text');

	$options[] = array(		
		'desc' => __('Change read more button text for latest blog post', 'sports-club'),
		'id' => 'readmoretext',
		'std' => 'Read More',
		'type' => 'text');	

	$options[] = array(		
		'desc' => __('Select excerpt length for footer latest posts', 'modeling-pro'),
		'id' => 'footerpostslength',
		'std' => '8',
		'type' => 'text');	

	$options[] = array(		
		'desc' => __('Select for footer posts View More text', 'modeling-pro'),
		'id' => 'footerviewmore',
		'std' => 'View More...',
		'type' => 'text');	
	
	$options[] = array(		
		'desc' => __('Select for footer posts View More Link', 'modeling-pro'),
		'id' => 'footerviewmorelink',
		'std' => '#',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Change Show All Button text for photo gallery section', 'sports-club'),
		'id' => 'galleryshowallbtn',
		'std' => 'Show All',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Change menu word on responsive view', 'sports-club'),
		'id' => 'menuwordchange',
		'std' => 'Menu',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Blog Single Layout', 'sports-club'),
		'desc' => __('Select layout. eg:ight-sidebar, left-sidebar, full-width', 'sports-club'),
		'id' => 'singlelayout',
		'type' => 'select',
		'std' => 'singleright',
		'options' => array('singleright'=>'Blog Single Right Sidebar', 'singleleft'=>'Blog Single Left Sidebar', 'sitefull'=>'Blog Single Full Width', 'nosidebar'=>'Blog Single No Sidebar') );	
		
	$options[] = array(
		'name' => __('Team Single Layout', 'sports-club'),
		'desc' => __('Select layout. eg:left,right,full', 'sports-club'),
		'id' => 'teamsinglelayout',
		'type' => 'select',
		'std' => 'singleright',
		'options' => array('singleright'=>'Team Single Right Sidebar', 'singleleft'=>'Team Single Left Sidebar', 'sitefull'=>'Team Single Full Width', 'nosidebar'=>'Team Single No Sidebar') );		
		
	$options[] = array(
		'name' => __('Woocommerce Page Layout', 'sports-club'),
		'desc' => __('Select layout. eg:right-sidebar, left-sidebar, full-width', 'sports-club'),
		'id' => 'woocommercelayout',
		'type' => 'select',
		'std' => 'woocommercesitefull',
		'options' => array('woocommerceright'=>'Woocommerce Right Sidebar', 'woocommerceleft'=>'Woocommerce Left Sidebar', 'woocommercesitefull'=>'Woocommerce Full Width') );	
		
	$options[] = array(	
		'name' => __('Testimonials Rotating Speed', 'sports-club'),	
		'desc' => __('manage testimonials rotating speed.', 'sports-club'),
		'id' => 'testimonialsrotatingspeed',
		'std' => '8000',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('True/False Auto play Testimonials.','sports-club'),
		'id' => 'testimonialsautoplay',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'True', 'false'=>'False'));			
		

	//Layout Settings
	$options[] = array(
		'name' => __('Sections', 'sports-club'),
		'type' => 'heading');	

	$options[] = array(			
		'name' => __('Five Box Services Section', 'sports-club'),
		'desc'	=> __('first box for frontpage section','sports-club'),
		'id' 	=> 'box1',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for first box.', 'sports-club'),
		'id' => 'boximg1',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Second box for frontpage section','sports-club'),
		'id' 	=> 'box2',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for second box.', 'sports-club'),
		'id' => 'boximg2',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Third box for frontpage section','sports-club'),
		'id' 	=> 'box3',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for third box.', 'sports-club'),
		'id' => 'boximg3',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	
	$options[] = array(	
		'desc'	=> __('Fourth box for frontpage section','sports-club'),
		'id' 	=> 'box4',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for fourth box.', 'sports-club'),
		'id' => 'boximg4',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
		
	$options[] = array(	
		'desc'	=> __('Fifth box for frontpage section','sports-club'),
		'id' 	=> 'box5',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for fifth box.', 'sports-club'),
		'id' => 'boximg5',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
		
	$options[] = array(	
		'desc'	=> __('Six box for frontpage section','sports-club'),
		'id' 	=> 'box6',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for six box.', 'sports-club'),
		'id' => 'boximg6',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');		
	
	$options[] = array(			
			'desc'	=> __('Check to hide above five column section 1', 'sports-club'),
			'id'	=> 'hidefourbxsec',
			'type'	=> 'checkbox',
			'std'	=> '');
			
	$options[] = array(	
		'name' => __('About Sports Club Section', 'sports-club'),
		'desc'	=> __('select page for about sports club section','sports-club'),
		'id' 	=> 'welcomebox',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for about sports club page', 'sports-club'),
		'id' => 'welcomeimg',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(			
		'desc'	=> __('Check to hide about sports club section', 'sports-club'),
		'id'	=> 'hidewelcomesection',
		'type'	=> 'checkbox',
		'std'	=> '');	//About sports sectiom end		
		
		
	$options[] = array(	
		'name' => __('Three box Services Section', 'social-care'),
		'desc' => __('Change custom heading text for page', 'social-care'),
		'id' => 'sectionserstitle',
		'std' => 'Our Services',
		'type' => 'text');		
	
	$options[] = array(	
		'desc' => __('Change custom heading text for sub title page', 'social-care'),
		'id' => 'sectionservicesubtitle',
		'std' => 'Nam fermentum ullamcorper luctus. Integer ultricies imperdiet rutrum. Donec vel ultrices purus. Vestibulum posuere eget magna eu blandit. Sed fermentum, est ut tincidunt luctus, urna tell',
		'type' => 'textarea');	
	
	$options[] = array(			
		'desc'	=> __('first Services box for frontpage section','social-care'),
		'id' 	=> 'servbox1',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for first box.', 'social-care'),
		'id' => 'servboximg1',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Second Services box for frontpage section','social-care'),
		'id' 	=> 'servbox2',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for second box.', 'social-care'),
		'id' => 'servboximg2',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Third Services box for frontpage section','social-care'),
		'id' 	=> 'servbox3',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for third box.', 'social-care'),
		'id' => 'servboximg3',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	
	$options[] = array(	
		'desc'	=> __('Fourth Services box for frontpage section','social-care'),
		'id' 	=> 'servbox4',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for fourth box.', 'social-care'),
		'id' => 'servboximg4',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
		
	$options[] = array(	
		'desc'	=> __('Fifth Services box for frontpage section','social-care'),
		'id' 	=> 'servbox5',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for fifth box.', 'social-care'),
		'id' => 'servboximg5',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
		
	$options[] = array(	
		'desc'	=> __('Six Services box for frontpage section','social-care'),
		'id' 	=> 'servbox6',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for six box.', 'social-care'),
		'id' => 'servboximg6',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');	
		
	$options[] = array(		
		'desc' => __('Select excerpt length for home page section 3', 'sports-club'),
		'id' => 'servboxlength',
		'std' => '30',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Home page section 3 text (READ MORE)', 'sports-club'),
		'id' => 'servreadmore',
		'std' => 'READ MORE',
		'type' => 'text');		
	
	$options[] = array(			
			'desc'	=> __('Check to hide above our services three column section', 'social-care'),
			'id'	=> 'hideservicesbxsec',
			'type'	=> 'checkbox',
			'std'	=> '');		
	
	$options[] = array(
		'name' => __('Number of Sections', 'sports-club'),
		'desc' => __('Select number of sections', 'sports-club'),
		'id' => 'numsection',
		'type' => 'select',
		'std' => '10',
		'options' => array_combine(range(1,30), range(1,30)) );

	$numsecs = of_get_option( 'numsection', 10 );

	for( $n=1; $n<=$numsecs; $n++){
		$options[] = array(
			'desc' => __("<h3>Section ".$n."</h3>", 'sports-club'),
			'class' => 'toggle_title',
			'type' => 'info');	
	
		$options[] = array(
			'name' => __('Section Title', 'sports-club'),
			'id' => 'sectiontitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_title']) ) ? $section_text[$n]['section_title'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section ID', 'sports-club'),
			'desc'	=> __('Enter your section ID here. SECTION ID MUST BE IN SMALL LETTERS ONLY AND DO NOT ADD SPACE OR SYMBOL.', 'sports-club'),
			'id' => 'menutitle'.$n,
			'std' => ( ( isset($section_text[$n]['menutitle']) ) ? $section_text[$n]['menutitle'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Background Color', 'sports-club'),
			'desc' => __('Select background color for section', 'sports-club'),
			'id' => 'sectionbgcolor'.$n,
			'std' => ( ( isset($section_text[$n]['bgcolor']) ) ? $section_text[$n]['bgcolor'] : '' ),
			'type' => 'color');
			
		$options[] = array(
			'name' => __('Background Image', 'sports-club'),
			'id' => 'sectionbgimage'.$n,
			'class' => '',
			'std' => ( ( isset($section_text[$n]['bgimage']) ) ? $section_text[$n]['bgimage'] : '' ),
			'type' => 'upload');

		$options[] = array(
			'name' => __('Section CSS Class', 'sports-club'),
			'desc' => __('Set class for this section.', 'sports-club'),
			'id' => 'sectionclass'.$n,
			'std' => ( ( isset($section_text[$n]['class']) ) ? $section_text[$n]['class'] : '' ),
			'type' => 'text');
			
		$options[] = array(
			'name'	=> __('Hide Section', 'sports-club'),
			'desc'	=> __('Check to hide this section', 'sports-club'),
			'id'	=> 'hidesec'.$n,
			'type'	=> 'checkbox',
			'std'	=> '');

		$options[] = array(
			'name' => __('Section Content', 'sports-club'),
			'id' => 'sectioncontent'.$n,
			'std' => ( ( isset($section_text[$n]['content']) ) ? $section_text[$n]['content'] : '' ),
			'type' => 'editor');
	}


	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'sports-club'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Inner Page Banner', 'sports-club'),
		'desc' => __('Upload inner page banner for site', 'sports-club'),
		'id' => 'innerpagebanner',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/inner-banner.jpg",
		'type' => 'upload');
		
		
	$options[] = array(
		'name' => __('Custom Slider Shortcode Area For Home Page', 'sports-club'),
		'desc' => __('Enter here your slider shortcode without php tag', 'sports-club'),
		'id' => 'customslider',
		'std' => '',
		'type' => 'textarea');		
		
	$options[] = array(
		'name' => __('Slider Effects and Timing', 'sports-club'),
		'desc' => __('Select slider effect.','sports-club'),
		'id' => 'slideefect',
		'std' => 'random',
		'type' => 'select',
		'options' => array('random'=>'Random', 'fade'=>'Fade', 'fold'=>'Fold', 'sliceDown'=>'Slide Down', 'sliceDownLeft'=>'Slide Down Left', 'sliceUp'=>'Slice Up', 'sliceUpLeft'=>'Slice Up Left', 'sliceUpDown'=>'Slice Up Down', 'sliceUpDownLeft'=>'Slice Up Down Left', 'slideInRight'=>'SlideIn Right', 'slideInLeft'=>'SlideIn Left', 'boxRandom'=>'Box Random', 'boxRain'=>'Box Rain', 'boxRainReverse'=>'Box Rain Reverse', 'boxRainGrow'=>'Box Rain Grow', 'boxRainGrowReverse'=>'Box Rain Grow Reverse' ));
		
	$options[] = array(
		'desc' => __('Animation speed should be multiple of 100.', 'sports-club'),
		'id' => 'slideanim',
		'std' => 500,
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add slide pause time.', 'sports-club'),
		'id' => 'slidepause',
		'std' => 4000,
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide Controllers', 'sports-club'),
		'desc' => __('Hide/Show Direction Naviagtion of slider.','sports-club'),
		'id' => 'slidenav',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Hide/Show pager of slider.','sports-club'),
		'id' => 'slidepage',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Pause Slide on Hover.','sports-club'),
		'id' => 'slidepausehover',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Yes', 'false'=>'No'));
		
		
	$options[] = array(
		'name' => __('Slider Image 1', 'sports-club'),
		'desc' => __('First Slide', 'sports-club'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider1.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 1', 'sports-club'),
		'id' => 'slidetitle1',
		'std' => 'LIFE IS ABOUT TIMING',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc1',
		'std' => 'consectetur adipiscing elit. Vivamus eu pharetra ex.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton1',
		'std' => 'READ MORE',
		'type' => 'text');	

	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl1',
		'std' => '#link1',
		'type' => 'text');		
		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'sports-club'),
		'desc' => __('Second Slide', 'sports-club'),
		'class' => '',
		'id' => 'slide2',
		'std' => get_template_directory_uri()."/images/slides/slider2.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 2', 'sports-club'),
		'id' => 'slidetitle2',
		'std' => 'CHAMPIONS LEAGUE',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc2',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
		'type' => 'textarea');	
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton2',
		'std' => 'READ MORE',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl2',
		'std' => '#link2',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Slider Image 3', 'sports-club'),
		'desc' => __('Third Slide', 'sports-club'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider3.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 3', 'sports-club'),
		'id' => 'slidetitle3',
		'std' => 'IN LOVE WITH FOOTBALL',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc3',
		'std' => 'consectetur adipiscing elit. Vivamus eu pharetra ex.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton3',
		'std' => 'READ MORE',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl3',
		'std' => '#link3',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Slider Image 4', 'sports-club'),
		'desc' => __('Third Slide', 'sports-club'),
		'id' => 'slide4',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 4', 'sports-club'),
		'id' => 'slidetitle4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton4',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl4',
		'std' => '',
		'type' => 'text');				
	
	$options[] = array(
		'name' => __('Slider Image 5', 'sports-club'),
		'desc' => __('Fifth Slide', 'sports-club'),
		'id' => 'slide5',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 5', 'sports-club'),
		'id' => 'slidetitle5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton5',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl5',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 6', 'sports-club'),
		'desc' => __('Sixth Slide', 'sports-club'),
		'id' => 'slide6',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 6', 'sports-club'),
		'id' => 'slidetitle6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton6',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl6',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 7', 'sports-club'),
		'desc' => __('Seventh Slide', 'sports-club'),
		'id' => 'slide7',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 7', 'sports-club'),
		'id' => 'slidetitle7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton7',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl7',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 8', 'sports-club'),
		'desc' => __('Eighth Slide', 'sports-club'),
		'id' => 'slide8',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 8', 'sports-club'),
		'id' => 'slidetitle8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton8',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl8',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 9', 'sports-club'),
		'desc' => __('Ninth Slide', 'sports-club'),
		'id' => 'slide9',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 9', 'sports-club'),
		'id' => 'slidetitle9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton9',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl9',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 10', 'sports-club'),
		'desc' => __('Tenth Slide', 'sports-club'),
		'id' => 'slide10',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 10', 'sports-club'),
		'id' => 'slidetitle10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'sports-club'),
		'id' => 'slidedesc10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'sports-club'),
		'id' => 'slidebutton10',
		'std' => '',
		'type' => 'text');			
	
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'sports-club'),
		'id' => 'slideurl10',
		'std' => '',
		'type' => 'text');
	

	//Footer SETTINGS
	$options[] = array(
		'name' => __('Footer', 'sports-club'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Footer Social Icons', 'sports-club'),
		'desc' => __('social icons for footer', 'sports-club'),
		'id' => 'footersocialicon',
		'std' => '
[social_area]
[social icon="fab fa-facebook-f" link="#"]
[social icon="fab fa-twitter" link="#"]
[social icon="fab fa-linkedin-in" link="#"]
[social icon="fab fa-google-plus-g" link="#"]				
[/social_area]',
		'type' => 'textarea');			
		
	$options[] = array(
		'name' => __('Footer Layout', 'sports-club'),
		'desc' => __('footer Select layout. eg:Column, 1, 2, 3 and 4', 'sports-club'),
		'id' => 'footerlayout',
		'type' => 'select',
		'std' => 'fourcolumn',
		'options' => array('onecolumn'=>'Footer 1 column', 'twocolumn'=>'Footer 2 column', 'threecolumn'=>'Footer 3 column', 'fourcolumn'=>'Footer 4 column', ) );	
		
						
	$options[] = array(
		'desc' => __('Select background Image for footer', 'sports-club'),
		'id' => 'footerbgimage',
		'std' => get_template_directory_uri().'/images/footer-bg.jpg',
		'type' => 'upload');	
				
	$options[] = array(
		'name' => __('Footer Keep in touch Title', 'sports-club'),
		'desc' => __('Keep in touch title for footer', 'sports-club'),
		'id' => 'abouttitle',
		'std' => 'Contact Details',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Contact Details Description', 'sports-club'),
		'desc' => __('Contact Details Description for footer', 'sports-club'),
		'id' => 'aboutusdescription',
		'std' => '
		<p><i class="fas fa-map-marker-alt"></i> pharetra ex. Etiam eget diam ligula sed at blandit ante.</p>
		<p><i class="fas fa-phone fa-rotate-90"></i> 0123-456-789</p>
		<p><i class="fas fa-envelope"></i> info@sportsclub.com</p>
		<p><i class="fas fa-globe"></i> www.yourdomainname.com</p>
		<p><i class="far fa-clock"></i> 7AM - 8PM</p>
		',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Footer Quick link title', 'sports-club'),
		'desc' => __('Add footer quick link title here', 'sports-club'),
		'id' => 'quicklinktitle',
		'std' => 'Quick Links',
		'type' => 'text');	
		
	
	$options[] = array(
		'name' => __('Footer About Us Title', 'sports-club'),
		'desc' => __('Footer About Us title.', 'sports-club'),
		'id' => 'ourservicestitle',
		'std' => 'About Us',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Footer About Us Description', 'sports-club'),
		'desc' => __('Footer About Us Description.', 'sports-club'),
		'id' => 'donationarea',
		'std' => 'Quisque id odio. Duis vel nibh at velit scelerisque suscipit. In ut quam vitae odio lacinia tincidunt. Pellentesque libero tortor, tincidunt et',
		'type' => 'textarea');		
			
	$options[] = array(
		'name' => __('Latest Posts', 'sports-club'),
		'desc' => __('Add latest post title here', 'sports-club'),
		'id' => 'letestpoststitle',
		'std' => 'Latest Posts',
		'type' => 'text');	
 		
	$options[] = array(
		'desc' => __('Footer Logo', 'sports-club'),
		'id' => 'ftlink',
		'std' => get_template_directory_uri().'/images/footer-logo.png',
		'type' => 'upload',);		
		
	$options[] = array(
		'desc' => __('Footer Copyright text', 'sports-club'),
		'id' => 'copytext',
		'std' => 'Copyright &copy; 2019 Sports Club. Design & developed by <a href="'.esc_url('https://www.gracethemes.com/').'" target="_blank">Grace Themes</a>',
		'type' => 'textarea',);

 		
		
	$options[] = array(
		'desc' => __('Footer Back to Top Button', 'sports-club'),
		'id' => 'backtotop',
		'std' => '[back-to-top]',
		'type' => 'textarea',);
		
	//Contact Page
	$options[] = array(
		'name' => __('Contact Us Page', 'sports-club'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Contact page details', 'sports-club'),
		'desc' => __('Add contact page details here', 'sports-club'),
		'id' => 'contactpagedetails',
		'std' => '[column_content type="one_half"]
[contact-details icon="fas fa-map-marker-alt" title="Address" info="10 Nr. Street Road, Ohio, USA"]
[contact-details icon="fas fa-phone-square" title="Contact No." info="+91 345-677-554"]
[contact-details icon="fas fa-envelope" title="Email Address" info="info@sitename.com"]
[contact-details icon="fab fa-skype" title="Skype Id" info="mysiteweb"]
[contact-details icon="far fa-clock" title="Working Days" info="monday-friday 10.00AM-6.00PM"]	

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d412505.271238499!2d-115.45519531659504!3d36.12522845626667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80beb782a4f57dd1%3A0x3accd5e6d5b379a3!2sLas+Vegas%2C+NV%2C+USA!5e0!3m2!1sen!2sin!4v1538305726773" width="500" height="225" frameborder="0" style="border:0" allowfullscreen></iframe>

[/column_content]

[column_content type="one_half_last"]
[contactform to_email="test@example.com" title="Contact Form"] 
[/column_content]',
		'type' => 'editor');
		
		

	//Short codes
	$options[] = array(
		'name' => __('Short Codes', 'sports-club'),
		'type' => 'heading');
			
	$options[] = array(
		'name' => __('Video image', 'sports-club'),
		'desc' => __('[custom-video youtubeid="5ThQLGbt8bM" image="image path with https cover photo"]', 'sports-club'),
		'type' => 'info');	
	
	$options[] = array(
		'name' => __('Most Video image title and description', 'sports-club'),
		'desc' => __('[most_video youtubeid="7TIKAG8D-bY" image="ADD SITE URL HERE/images/most-video-1.jpg" title="Lorem Ipsum Dolor"]Nam fermentum ullamcor per luctus. Integer iet rutrum.[/most_video]', 'sports-club'),
		'type' => 'info');
		
		$options[] = array(
		'name' => __('Sports Club Features', 'sports-club'),
		'desc' => __('[row_area][featuresbox icon="ADD SITE URL HERE/images/feature-icon01.png" title="League Cup" description="Nam fermentum ullamcor per luctus. Integer ultricies imperdiet rutrum. " readmore="READ MORE" link="#" bgcolor="#ffffff"][featuresbox icon="ADD SITE URL HERE/images/feature-icon01.png" title="Championship " description="Nam fermentum ullamcor per luctus. Integer ultricies imperdiet rutrum. " readmore="READ MORE" link="#" bgcolor="#ffffff"][featuresbox icon="ADD SITE URL HERE/images/feature-icon02.png" title="Associations" description="Nam fermentum ullamcor per luctus. Integer ultricies imperdiet rutrum. " readmore="READ MORE" link="#" bgcolor="#ffffff"][featuresbox icon="ADD SITE URL HERE/images/feature-icon03.png" title="Trophies" description="Nam fermentum ullamcor per luctus. Integer ultricies imperdiet rutrum. " readmore="READ MORE" link="#" bgcolor="#ffffff"][/row_area]', 'sports-club'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Latest Results', 'sports-club'),
		'desc' => __('[column_content type="one_half"][latest_results matchdate="MON, OCT 21, YOUTH LEAGUE" teamicon1="ADD SITE URL HERE/images/team1.png" teamicon2="ADD SITE URL HERE/images/team2.png" teamscore1="3 Turkey" teamscore2="2 NFL" readmore="GAME DETAILS" link="#"][/column_content][column_content type="one_half_last"][latest_results matchdate="MON, OCT 21, YOUTH LEAGUE" teamicon1="ADD SITE URL HERE/images/team4.png" teamicon2="ADD SITE URL HERE/images/team3.png" teamscore1="1 NOL" teamscore2="0 NFL" readmore="GAME DETAILS" link="#"][/column_content]', 'sports-club'),
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Upcoming Match', 'sports-club'),
		'desc' => __('[upcomingmatch month="JAN" date="27" title="TRAIL RUN" matchtype="Central Park" readmore="Read More" url="#" target="_self" bgcolor="#ffffff"]', 'sports-club'),
		'type' => 'info');
				
	$options[] = array(
		'name' => __('Latest News', 'sports-club'),
		'desc' => __('[latest-news showposts="4" date="show" comment="no" author="no" readmore="READ MORE" excerptlength="15"]', 'sports-club'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Our Team', 'sports-club'),
		'desc' => __('[our-team show="-1"]', 'sports-club'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Awards', 'sports-club'),
		'desc' => __('[awards_lists][award icon="ADD SITE URL HERE/images/awards1.png" title="2018 LOREM IPSUM DOLOR" link="#"][award icon="ADD SITE URL HERE/images/awards2.png" title="2018 LOREM IPSUM DOLOR" link="#"][award icon="ADD SITE URL HERE/images/awards3.png" title="2018 LOREM IPSUM DOLOR" link="#"][award icon="ADD SITE URL HERE/images/awards4.png" title="2018 LOREM IPSUM DOLOR" link="#"][award icon="ADD SITE URL HERE/images/awards5.png" title="2018 LOREM IPSUM DOLOR" link="#"][award icon="ADD SITE URL HERE/images/awards3.png" title="2018 LOREM IPSUM DOLOR" link="#"][/awards_lists]', 'sports-club'),
		'type' => 'info');	
	
	$options[] = array(
		'name' => __('Testimonials Rotator', 'sports-club'),
		'desc' => __('[testimonials]', 'sports-club'),
		'type' => 'info');
		
	
	$options[] = array(
		'name' => __('Photo Gallery', 'sports-club'),
		'desc' => __('[photogallery filter="true" show="8"]', 'sports-club'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Our Skills', 'sports-club'),
		'desc' => __('[skill title="Adobe Photoshop" percent="90" bgcolor="#ec4613"]<br />
		[skill title="WordPress" percent="60" bgcolor="#ec4613"]<br />
		[skill title="Photography" percent="70" bgcolor="#ec4613"]<br />
		[skill title="SEO" percent="50" bgcolor="#ec4613"]', 'sports-club'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Contact Details', 'sports-club'),
		'desc' => __('[contact-details icon="fas fa-map-marker-alt" title="Address" info="10 Nr. Street Road, Ohio, USA"]<br />
	 [contact-details icon="fas fa-phone-square" title="Contact No." info="+91 345-677-554"]<br />
	 [contact-details icon="fas fa-envelope" title="Email Address" info="info@sitename.com"]<br />
	 [contact-details icon="fab fa-skype" title="Skype Id" info="mysiteweb"]<br />
	 [contact-details icon="far fa-clock" title="Working Days" info="monday-friday 10.00AM-6.00PM"]	', 'sports-club'),
		'type' => 'info');		
		
	$options[] = array(
		'name' => __('Contact Form', 'sports-club'),
		'desc' => __('[contactform to_email="test@example.com" title="Contact Form"] 
', 'sports-club'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Custom Button', 'sports-club'),
		'desc' => __('[button align="center" name="Read More" link="#" target=""]', 'sports-club'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Search Form', 'sports-club'),
		'desc' => __('[searchform]', 'sports-club'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Social Icons ( Note: More social icons can be found at: https://fontawesome.com/icons/)', 'sports-club'),
		'desc' => __('[social_area]<br />
			[social icon="fab fa-facebook-f" link="#"]<br />
			[social icon="fab fa-twitter" link="#"]<br />
			[social icon="fab fa-linkedin-in" link="#"]<br />
			[social icon="fab fa-google-plus-g" link="#"]<br />
		[/social_area]', 'sports-club'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('2 Column Content', 'sports-club'),
		'desc' => __('<pre>
[column_content type="one_half"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_half_last"]
	Column 2 Content goes here...
[/column_content]
</pre>', 'sports-club'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('3 Column Content', 'sports-club'),
		'desc' => __('<pre>
[column_content type="one_third"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_third"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_third_last"]
	Column 3 Content goes here...
[/column_content]
</pre>', 'sports-club'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('4 Column Content', 'sports-club'),
		'desc' => __('<pre>
[column_content type="one_fourth"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fourth"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fourth"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fourth_last"]
	Column 4 Content goes here...
[/column_content]
</pre>', 'sports-club'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('5 Column Content', 'sports-club'),
		'desc' => __('<pre>
[column_content type="one_fifth"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 4 Content goes here...
[/column_content]

[column_content type="one_fifth_last"]
	Column 5 Content goes here...
[/column_content]
</pre>', 'sports-club'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('Tabs', 'sports-club'),
		'desc' => __('<pre>
[tabs]
	[tab title="TAB TITLE 1"]
		TAB CONTENT 1
	[/tab]
	[tab title="TAB TITLE 2"]
		TAB CONTENT 2
	[/tab]
	[tab title="TAB TITLE 3"]
		TAB CONTENT 3
	[/tab]
[/tabs]
</pre>', 'sports-club'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Toggle Content', 'sports-club'),
		'desc' => __('<pre>
[toggle_content title="Toggle Title 1"]
	Toggle content 1...
[/toggle_content]
[toggle_content title="Toggle Title 2"]
	Toggle content 2...
[/toggle_content]
[toggle_content title="Toggle Title 3"]
	Toggle content 3...
[/toggle_content]
</pre>', 'sports-club'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Accordion Content', 'sports-club'),
		'desc' => __('<pre>
[accordion]
	[accordion_content title="ACCORDION TITLE 1"]
		ACCORDION CONTENT 1
	[/accordion_content]
	[accordion_content title="ACCORDION TITLE 2"]
		ACCORDION CONTENT 2
	[/accordion_content]
	[accordion_content title="ACCORDION TITLE 3"]
		ACCORDION CONTENT 3
	[/accordion_content]
[/accordion]
</pre>', 'sports-club'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Clear', 'sports-club'),
		'desc' => __('<pre>
[clear]
</pre>', 'sports-club'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Blank Height (space)', 'sports-club'),
		'desc' => __('<pre>
[space height="20px"]
</pre>', 'sports-club'),
		'type' => 'info');		

	$options[] = array(
		'name' => __('HR / Horizontal separation line', 'sports-club'),
		'desc' => __('<pre>
[hr] or &lt;hr&gt;
</pre>', 'sports-club'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Subtitle', 'sports-club'),
		'desc' => __('[subtitle color="#111111" size="15px" align="left" description="short descriptio here"]', 'sports-club'),
		'type' => 'info');	
	
	$options[] = array(
		'name' => __('Scroll to Top', 'sports-club'),
		'desc' => __('[back-to-top] 
', 'sports-club'),
		'type' => 'info');

	return $options;
}