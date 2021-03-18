import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator} from '@react-navigation/stack';
import { Entypo } from '@expo/vector-icons';
import { Ionicons } from '@expo/vector-icons';
import { TouchableOpacity, TouchableOpacityBase, ViewBase } from 'react-native';

import Login from './pages/Login';
import Lista from './pages/Lista'; 
import Home from './pages/Home';
import Detalhes from './pages/Detalhes';
import Dados_us from './pages/Dados_us';

//import Cad_liv from './pages/Cad_liv';
import Cad_us from './pages/Cad_us';

//import Chat from './pages/Chat';*/



import { ScreenStackHeaderRightView } from 'react-native-screens';

 
const Stack = createStackNavigator();
 
function Routes(){
    return(
        <NavigationContainer>
            <Stack.Navigator>

            <Stack.Screen 
                name="BookSpace"
                component={Home}
                options={{ headerShown: false }}
                   /* headerLeft: () => (
                      <TouchableOpacity style={{ marginLeft: 15 }}>
                          <Entypo
                          name="menu"
                          size={40}
                          color="black"
                />
                   </TouchableOpacity>
                    )   */                 
               
                />
            <Stack.Screen
                 name="Cad_us"
                component={Cad_us}
                options={{ headerShown: false }}
                />

 
          
          
                 <Stack.Screen
                 name="Dados_us"
                component={Dados_us}
                />  
                 <Stack.Screen
                 name="Detalhes"
                component={Detalhes}
                />  
            </Stack.Navigator>
        </NavigationContainer>
    )
}

export default Routes;