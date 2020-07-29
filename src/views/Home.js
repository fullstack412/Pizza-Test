import React, { Component } from 'react';
import styled from 'styled-components';
import PropTypes from 'prop-types';
import { FontTypes, FontWeights } from '../base/Fonts';
import Center from '../components/Center';
import Text from '../components/Text';
import BackgroundImage from '../components/BackgroundImage';
import SearchBar from '../components/SearchBar';
import Space from '../components/Space';
import Spacing from '../base/Spacing';

const HomeContainer = styled.div`
  background-image: url("http://7wallpapers.net/wp-content/uploads/19_Pizza.jpg");
  background-repeat: no-repeat;
  width: 100%;
  height: 90vh;
`;

const AlignRight = styled.div`
  align-items: flex-start;
`;

class Home extends Component {
  static propTypes = {
    history: PropTypes.any,
  };

  onSearch = query => {
    const queryString = query ? `search=${query}` : '';
    this.props.history.push(`/results/?${queryString}`);
  };

  render() {
    return (
      <HomeContainer>
        <BackgroundImage />

        <Center>
          <AlignRight>
            <Text type={FontTypes.BigTitle} fontWeight={FontWeights.semiBold} color="#fff">
            Pizza makes anything possible.
            </Text>
            <Space height={Spacing.get('1x')} display="block" />
            <Text type={FontTypes.BigTitle}   color="#fff">
            Henry Rollins.
            </Text>
            <Space height={Spacing.get('8x')} display="block" />
            <SearchBar onSearch={this.onSearch} />
          </AlignRight>
        </Center>
      </HomeContainer>
    );
  }
}

export default Home;
