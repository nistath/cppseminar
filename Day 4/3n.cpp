#include <iostream>

using namespace std;

int count = 0;

int n3(int n){
    for(int i = 0; i < count; i++) cout << " ";
    count++;
    if(n == 1){
        for(int i = 0; i < count; i++) cout << " ";
        cout << "1 is " << 0 << endl;
        count--;
        return 0;
    }
    else if(n % 2== 0){
        cout << "N is " << n << " need to find " << n / 2 << endl;
        int val = n3(n / 2);
        for(int i = 0; i < count; i++) cout << " ";
        cout <<n / 2 << " is " << val << endl;
        count--;
        return val + 1;
    }
    else if (n % 2 == 1){
        cout << "N is " << n << " need to find " << 3*n + 1  << endl;
        int val = n3(3*n + 1);
        for(int i = 0; i < count; i++) cout << " ";
        cout << 3*n + 1 << " is " << val << endl;
        count--;
        return val + 1;
    }
}

int main(){
    int n;
    cin >> n;
    cout << n3(n) << endl;
}
