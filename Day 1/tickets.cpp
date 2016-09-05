#include <iostream>
using namespace std;

int main(){
    int N, A, B, C, D;

    cin>>N>>A>>B>>C>>D;

    int price, temp;

    price = N*10; // No discount (default)
    if(N>=D){ // Maximum discount
        price=N*6;
    }
    else if(N>=C){ // C discount or buy more to get D discount
        price=N*7;
        temp=D*6;

        if(temp<price){
            price = temp;
        }
    }
    else if(N>=B){ // B discount or buy more to get C discount
        price=N*8;
        temp=C*7;

        if(temp<price){
            price = temp;
        }
    }
    else if(N>=A){ // A discount or buy more to get B discount
        price=N*9;
        temp=B*8;

        if(temp<price){
            price = temp;
        }
    }
    else{
        price=N*10;
        temp=A*9;

        if(temp<price){
            price = temp;
        }
    }

    cout<<"You'll pay "<<price;
    return 0;
}
