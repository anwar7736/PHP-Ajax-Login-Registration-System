 <?php 
	class calculation{
		public function add($num1, $num2){
			echo "The summation is : ".($num1+$num2)."<br>";
		}
		public function sub($num1, $num2){
			echo "The subtraction is : ".($num1-$num2)."<br>";
		}
		public function mul($num1, $num2){
			echo "The multiplication is : ".($num1*$num2)."<br>";
		}
		public function div($num1, $num2){
			echo "The divided is : ".($num1/$num2)."<br>";
		}
		public function mod($num1, $num2){
			echo "The modulus is : ".($num1%$num2);
		}
		
	
	}
 ?>