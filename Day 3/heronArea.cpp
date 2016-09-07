#include <iostream>
#include <cmath>
using namespace std;

double area(double a, double b, double c){
    double s = (a+b+c)/2;
    double hero = s*(s-a)*(s-b)*(s-c);

    return sqrt(hero);
}

int main(){
    double i, j, k;

    cin>>i>>j>>k;

    cout<<area(i, j, k);

    return 0;
}
