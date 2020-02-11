package chapter02.exercise_2_19_tobinary;

import java.util.Scanner;

public class ToBinaryString {

	public static void main(String[] args) {
		
		System.out.println("������ �Է��ϸ� ���������� �ٲٰڴ�. : ");
		Scanner scanner = new Scanner(System.in);
		int number = scanner.nextInt();
		String string=toBinaryString(number) ;
		System.out.println(number + " ���������� ��ȯ�ϸ� : " + string);
	}
	
	public static String toBinaryString(int number) {
		String string = Integer.toBinaryString(number);
		
		while(string.length()<32) {
			string = "0"+string;
		}
		return string;
	}

}
