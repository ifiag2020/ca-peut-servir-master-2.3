<?php


class Idao implements Imetier
{

    public   static  $_CNX; 
    public static $table = "user";
    public const TVA = 20;
	public static $cart_id = 0 ;
	
    public static  function connect()
    {
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
        ];
        try {
            // self:: => access static et cte 
            if (!self::$_CNX) {
                self::$_CNX = new PDO("mysql:host=localhost;dbname=servir;", 'root', '', $options);
            }
        } catch (PDOException $e) {
            die("Erreur de connexion a la base de donnees " . $e->getMessage());
        }
    }
	
    public static  function store(array $data)
    {
        try {
            $keys = array_keys($data);
            $str_keys = join(",", $keys);

            $inter = function ($valeur) {
                return "?";
            };
            $in = array_map($inter, $keys);
            $p_intero = join(',', $in);
            $rp = self::$_CNX->prepare("insert into " . static::$table . " ($str_keys) values($p_intero)");
            $rp->execute(array_values($data));
        } catch (PDOException $e) {
            die("Erreur d'ajout de " . static::$table . " " . $e->getMessage());
        }
    }
    public  static  function update($data, ?int $id = 0)
    {
        // $data=['login'=>'ali','passe'=>1234]
        try {
            $keys = array_keys($data); //['login','passe]


            $inter = function ($valeur) {
                return "$valeur=?";
            };
            $in = array_map($inter, $keys); //['login','passe'] =>['login'=>'?', 'passe'=>'?']

            $p_intero = join(',', $in); //"login=?,passe=?"
            $rp = self::$_CNX->prepare("update  " . static::$table . " set $p_intero where id_" . static::$table . "=? ");
            $valeurs = array_values($data); //'ali','1234'
            $valeurs[] = $id;
            $rp->execute($valeurs);
        } catch (PDOException $e) {
            die("Erreur de modification de " . static::$table . " " . $e->getMessage());
        }
    }

	public static  function updatecart($id)
    {
        try {
            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("update cart_produit set `delete` = '1' WHERE id_cart_produit=?");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
           // $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
           // return $result;
        } catch (PDOException $e) {
            die("Erreur de recuperation (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
	
	
    public  static  function updateProduct($table, $data, ?int $id = 0)
    {
        // $data=['login'=>'ali','passe'=>1234]
        try {
            $keys = array_keys($data); //['login','passe]


            $inter = function ($valeur) {
                return "$valeur=?";
            };
            $in = array_map($inter, $keys); //['login','passe'] =>['login'=>'?', 'passe'=>'?']

            $p_intero = join(',', $in); //"login=?,passe=?"
            $rp = self::$_CNX->prepare("update  " . $table . " set $p_intero where id_" . $table . "=? ");
            $valeurs = array_values($data); //'ali','1234'
            $valeurs[] = $id;
            $rp->execute($valeurs);
        } catch (PDOException $e) {
            die("Erreur de modification de " . $table . " " . $e->getMessage());
        }
    }
	
	
    public static function all(): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from " . static::$table . "  order by id_user desc ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute();
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }

    public static function countprod()
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT COUNT(id_produit) AS cpt FROM produit ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_ASSOC);
            $rp->execute();
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
	public static function countfourniss()
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT COUNT(DISTINCT u.id_user) AS cpt FROM user AS u LEFT JOIN produit AS p ON(p.id_user = u.id_user)");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_ASSOC);
            $rp->execute();
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
    public static  function find(int $id)
    {
        try {
            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from ".static::$table." where  id_".static::$table."=?");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur de recuperation (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
	
    //findBy("login like ?",['ali'])
    public static  function findBy($condition, $data_values)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from " . static::$table . " where $condition order by id desc ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());

            $rp->execute($data_values);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
    public static  function delete($id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("delete  from " . static::$table . " where id=?");
            // executer 
            $rp->execute([$id]);
        } catch (PDOException $e) {
            die("Erreur de suppression  des " . static::$table . "  " . $e->getMessage());
        }
    }
    public static  function deleteProduit($id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("delete  from " . static::$table . " where id_produit=?");
            // executer 
            $rp->execute([$id]);
        } catch (PDOException $e) {
            die("Erreur de suppression  des " . static::$table . "  " . $e->getMessage());
        }
    }
	public static  function ConxPart($email, $pwd)
    {
            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from user WHERE email=? and pwd=? and `id_profile`='2'");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$email, $pwd]);
            $result = $rp->fetch(); //['email'=>a.b@c.com,'pwd'=>'xxxxx'] 
            return $result;
	}	
    public static  function ConxPro($email, $pwd)
    {
            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from user WHERE email=? and pwd=? and `id_profile`='3'");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$email, $pwd]);
            $result = $rp->fetch(); //['email'=>a.b@c.com,'pwd'=>'xxxxx'] 
            return $result;
	}
	
	 public static  function findid($nom, $nom_commerce)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT id_user from " . static::$table . " where  nom=?  or nom_commerce=?  ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$nom, $nom_commerce]);

            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
		 public static  function findidProfil($nom, $nom_commerce)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT id_profile from " . static::$table . " where  nom=? or nom_commerce=?  ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$nom, $nom_commerce]);

            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (findidProfil) de " . static::$table . "  " . $e->getMessage());
        }
    }
	public static  function finduser($id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from user where  id_user=?  ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);

            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
	
	public static function redirect($link = ""){
		echo "<script type='text/javascript'>window.location = '".$link."';</script>";
    }
    

    public static function allcat(): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from categorie");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute();
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }

    public static function alldep($id): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from produit where id_user=? ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
	    public static function alldetprod($id): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from produit where id_produit=? ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
	    public static function forniss($a,$b): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT DISTINCT u.nom, u.telephone, u.adresse FROM user AS u LEFT JOIN produit AS p ON(p.id_user = u.id_user) limit $a,$b");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$a,$b]);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
	    public static function libforniss($id): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT DISTINCT u.nom FROM user AS u LEFT JOIN produit AS p ON(p.id_user = u.id_user) WHERE p.id_produit =? ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
	    public static function favpart($id): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT * FROM `favoris` WHERE `delete`=0 AND `id_user`=? ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
    public static function allprod($a,$b): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from produit limit $a,$b ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$a,$b]);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
	
    public static function uploader(array $infos, $dossier = "produit/images")
    {
        if (!is_dir($dossier)) {
            mkdir($dossier, 777, true);
        }
        $original_client_name = $infos['name'];
        $tmp = $infos['tmp_name'];
        $path_parts = pathinfo($original_client_name);
        $ext = strtolower($path_parts['extension']);
        $new_name = md5(time() . rand(0, 99999)) . ".$ext";
        $chemin = "$dossier/$new_name";
        $autorise = ['png', 'jpeg', 'gif', 'webp', 'jpg', 'pdf'];
        if (!in_array($ext, $autorise)) {
            die("ce type de fichier n'est pas autorisé");
        } else if ($infos['size'] > 8 * 1024 * 1024) {
            die("la taille de ce fichier depasse 8Mo");
        } else if (!move_uploaded_file($tmp, $chemin)) {
            die("une erreur est survenue lors de l'upload di fichier");
        } else {
            return $chemin;
        }
    }

    public static  function storepanier(array $data)
    {
        try {
            $keys = array_keys($data);
            $str_keys = join(",", $keys);

            $inter = function ($valeur) {
                return "?";
            };
            $in = array_map($inter, $keys);
            $p_intero = join(',', $in);
            $rp = self::$_CNX->prepare("insert into cart_produit ($str_keys) values($p_intero)");
            $rp->execute(array_values($data));
			return $rp; 
        } catch (PDOException $e) {
            die("Erreur d'ajout de " . static::$table . " " . $e->getMessage());
        }
    }
	
	    public static  function storefavoris(array $data)
    {
        try {
            $keys = array_keys($data);
            $str_keys = join(",", $keys);

            $inter = function ($valeur) {
                return "?";
            };
            $in = array_map($inter, $keys);
            $p_intero = join(',', $in);
            $rp = self::$_CNX->prepare("insert into favoris ($str_keys) values($p_intero)");
            $rp->execute(array_values($data));
			return $rp; 
        } catch (PDOException $e) {
            die("Erreur d'ajout de " . static::$table . " " . $e->getMessage());
        }
    }
	
    public static  function storecart($id)
    {
        try {
            $rp = self::$_CNX->prepare("INSERT INTO cart (`id_user`,`delete`,`status`)VALUES (?, '0' , '1')");
            $rp->execute([$id]);
			self::$cart_id = self::$_CNX->lastInsertId(); 
        } catch (PDOException $e) {
            die("Erreur d'ajout de " . static::$table . " " . $e->getMessage());
        }
		
    }
	
		public static  function updatecarts($id)
    {
        try {
            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("update cart set `status` = '0' WHERE id_user=? AND `status` <> '2'");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
           // $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
           // return $result;
        } catch (PDOException $e) {
            die("Erreur de recuperation (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
	
		public static  function updatefav($id)
    {
        try {
            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("update favoris set `delete`='1' WHERE id_favoris=?");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
           // $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
           // return $result;
        } catch (PDOException $e) {
            die("Erreur de recuperation (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
	

		 public static  function findcart($id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT * FROM `cart` WHERE `status` = 1  AND `id_user` =?   ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);

            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (findidProfil) de " . static::$table . "  " . $e->getMessage());
        }
    }
	
	public static  function updateCartElmQty($id, $qte) {
        try {
            $rp = self::$_CNX->prepare("update cart_produit set `qte`=? WHERE id_cart_produit=?");
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$qte, $id]);
			return $rp;
        } catch (PDOException $e) {
            die("Erreur: " . static::$table . "  " . $e->getMessage());
        }
    }
	
	public static function getSumCart($id_cart) {
        try {
            $rp = self::$_CNX->prepare("SELECT SUM(p.prix) AS total FROM `cart_produit` AS cp LEFT JOIN `produit` AS p ON (p.id_produit = cp.id_produit) WHERE cp.`id_cart`=?");
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id_cart]);
			$result = $rp->fetch();
            return $result;
        } catch (PDOException $e) {
            die("Erreur: " . static::$table . "  " . $e->getMessage());
        }
    }
	
	public static function findCartObject($id)
    {
        try {
            $rp = self::$_CNX->prepare("SELECT * FROM `cart` WHERE `id_cart`=?");
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
            $result = $rp->fetch();
            return $result;
        } catch (PDOException $e) {
            die("Erreur de recuperation (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
	
	public static  function storecommande($id_cart)
    {
        try {
			$cart = self::findCartObject($id_cart);
			if($cart->status != 2){
				$total = self::getSumCart($id_cart);
				$ref_commande = mt_rand(1, 100) . 'IDAO'.date("YmdHsi");
				$date_commande = date("Y-m-d H:s:i");
				$montant_ht = $total->total;
				$montant_ttc = $total->total * 1.2;
				$date_add = date("Y-m-d H:s:i");
				
				$rp = self::$_CNX->prepare("
				INSERT INTO commande (`id_cart`,`ref_commande`,`date_commande`,`montant_ht`,`montant_ttc`,`date_add`,`delete`,`status`) 
				VALUES (?,?,?,?,?,?,'0','1')");
				
				$rp->execute([$id_cart, $ref_commande, $date_commande, $montant_ht, $montant_ttc, $date_add]); 
				
				self::updateCartTransfered($id_cart);
				self::updatecarts($cart->id_user);
				self::storecart($cart->id_user);
				$_SESSION["id_cart"] = Idao::$cart_id;
				return $rp;
			}else{
				return true;
			}
        } catch (PDOException $e) {
            die("Erreur d'ajout de " . static::$table . " " . $e->getMessage());
        }
    }
	
	public static  function updateCartTransfered($id_cart)
    {
        try {
            $rp = self::$_CNX->prepare("UPDATE `cart` SET `status` = '2' WHERE id_cart=?");
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id_cart]);
        } catch (PDOException $e) {
            die("Erreur de recuperation (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
	
	public static function cartElements($id_cart): array
    {
        try {
            $cart = self::findCartObject($id_cart);
			if($cart->status != 2){
				$rp = self::$_CNX->prepare("SELECT * FROM `cart_produit` WHERE `id_cart`=? AND `delete` = 0 AND `status` = 1");
				// executer 
				$rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
				$rp->execute([$id_cart]);
				$result = $rp->fetchAll();
				return $result;
			}else{
				return array();
			}
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
	
	    public static function listecommande($id): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT * FROM commande AS co LEFT JOIN cart AS ca ON(ca.id_cart = co.id_cart) WHERE ca.id_user =? ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
}