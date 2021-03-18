import 'react-native-gesture-handler';

import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { View} from 'react-native';
import { AppLoading } from 'expo';
//import { useFonts, Ruda} from '@expo-google-fonts/ruda';

import Routes from './src/router';

export default function App() {


/*  let [fontsLoaded] = useFonts({
    Ruda,
  });

 if(!fontsLoaded){
   return <AppLoading />;
 } */

  return (
    <>
     <StatusBar style="light" backgroundColor="#808080" translucent={true}  />
      <Routes/>
    </>
  );
}


