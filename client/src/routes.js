import React from 'react'
import { Switch, Route, Redirect } from 'react-router-dom'
import { FirstPage } from './pages/FirstPage'
import { SecondPage } from './pages/SecondPage'

import { AuthPage } from './pages/AuthPage'


export const useRoutes = isAuthenticated => {
    if (isAuthenticated) {
        return (
            <Switch>
                <Route path="/first" exact>
                    <FirstPage />
                </Route>
                <Route path="/second" exact>
                    <SecondPage />
                </Route>
                
                <Redirect to="/first" />
            </Switch>)
    }
    return (
        <Switch>
            <Route path="/" exact>
                <AuthPage />
            </Route>
            <Redirect to="/" />
        </Switch>

    )

}