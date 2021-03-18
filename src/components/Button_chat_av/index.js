import React from 'react';
import { View, Text, StyleSheet, TouchableOpacity } from 'react-native';

export default function Button_chat_av() {
 return (
  <View style={styles.container}>
      <TouchableOpacity style={styles.btnChat}>
         <Text style={styles.title}>CHAT</Text>
      </TouchableOpacity>
      <TouchableOpacity style={styles.btnAva}>
         <Text style={styles.title}>AVALIAR</Text>
      </TouchableOpacity>
  </View>
  );
}

const styles= StyleSheet.create({
   container:{
      flexDirection: 'row'
    },
    btnChat:{
        width: 130,
        height: 40,
        backgroundColor: '#17a2b8',
        borderRadius: 5,
       marginHorizontal: '5%',
       marginVertical: '65%',
       justifyContent: 'center',
       alignItems: 'center',
    },
    btnAva:{
       // flex: 1,
        width: 130,
        height: 40,
        backgroundColor: '#17a2b8',
        borderRadius: 5,
       marginVertical: '65%',
       justifyContent: 'center',
       alignItems: 'center',

    },
    title:{
        fontSize: 17,
        color: '#fff'

    }
})