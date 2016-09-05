#include <iostream>
using namespace std;

int main() {
	int age;
	cout<<"How old are you? ";
	cin>>age;
	cout<<"You will be "<<age+1<<" next year.\n";

	int num = 5;
	if(age<5){
		cout<<"You're a child!\n";
		num = 15;
	}
	else if (age<18){
		cout<<"You're a minor, but not a child!";
	}
	else {
		cout<<"You're an adult";
		num = 35;
	}

	cout<<"Neat!\n";
	cout<<num;

	return 0;
}
