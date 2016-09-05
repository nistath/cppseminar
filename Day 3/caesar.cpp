#include <iostream>
#include <string>
using namespace std;

string caesarEncrypt(string text, int key) {
    key=key%26;

    for(unsigned int i=0; i<text.length(); i++) {
        if(text[i]<='z' && text[i]>='a')
            text[i]=(text[i]+key-97)%26 + 97;
    }

    return text;
}

string caesarDecrypt(string text, int key) {
    key=key%26;

    for(unsigned int i=0; i<text.length(); i++) {
        if(text[i]<='z' && text[i]>='a')
            text[i]=(text[i]+(26-key)-97)%26 + 97;
    }

    return text;
}

string caesarAnalysis(string text, int mostFrequent) {
    int max=0;
    int maxLetter=0;
    int freq[26]={0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0};

    for(unsigned int i=0; i<text.length(); i++) {
        if(text[i]<='z' && text[i]>='a'){
            int pos=int(text[i])-97;
            freq[pos]++;

            if(freq[pos]>max) {
                max++;
                maxLetter=pos+1; // We consider a to be the 1st, not 0th.
            }
        }
    }

    int shift=maxLetter - mostFrequent;
    if(shift>0) {
        text=caesarDecrypt(text, shift); // Shift backward to decrypt.
    }
    else {
        text=caesarEncrypt(text, -shift); // Shift forward to encrypt.
    }

    return text;
}

int main() {
    string test;
    int shift;

    cout<<"Plaintext: ";
    getline(cin, test);
    cout<<"Shift Key: ";
    cin>>shift;
    cout<<endl;

    string encrypted=caesarEncrypt(test, shift);
    cout<<"Encrypted: "<<encrypted<<endl;

    string decrypted=caesarDecrypt(encrypted, shift);
    cout<<"Decrypted: "<<decrypted<<endl;

    string cryptanalysed=caesarAnalysis(encrypted, 5);
    cout<<"Cryptanalysed: "<<cryptanalysed<<endl;

    return 0;
}
