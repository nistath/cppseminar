#include <iostream>
#include <string>
using namespace std;

string caesarEncrypt(string a, int key){
    for(int i=0;i < a.length();i++){
        if(a[i]>='a' && a[i]<='z'){
            a[i] = ((a[i] - 'a') + key) % 26 +'a';
        }
    }

    return a;
}

string caesarDecrypt(string a, int key){
    for(int i=0;i < a.length();i++){
        if(a[i]>='a' && a[i]<='z'){
            a[i] = ((a[i] - 'a' + 26) + key) % 26 +'a';
        }
    }

    return a;
}

string caesarCryptanalyse(string encrypted, char mostFrequent){
    int freq[26] = {};
    int max = 0;
    char maxLetter;

    for(int i=0; i<encrypted.length(); i++){
        int number = encrypted[i] - 'a';

        freq[number]++;

        if(freq[number] > max){
            max = freq[number];
            maxLetter = encrypted[i];
        }
    }

    int key = maxLetter - mostFrequent;

    if(key>0){
        return caesarDecrypt(encrypted, key); // Shift backward
    }
    else{
        return caesarEncrypt(encrypted, -key); // Shift forward
        //return caesarDecrypt(encrypted, 26 + key);
    }
}

int main(){
    string plain = "Heeeeeloo";
    int key;
    cin>>key;

    string encrypted = caesarEncrypt(plain, key);
    cout<<encrypted<<"\n";

    string decrypted = caesarDecrypt(encrypted, key);
    cout<<decrypted;
    return 0;
}
